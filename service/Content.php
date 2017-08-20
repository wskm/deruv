<?php

namespace service;

use Yii;
use Wskm;
use yii\data\Pagination;
use yii\web\ServerErrorHttpException;
use common\models\Content as ContentModel;
use service\Category;

class Content
{

    const CACHE_KEY_PRE = 'content:list';

    public static function getRanking($order = 'pv', $limit = 10, $w = false)
    {
        if (!in_array($order, array('pv', 'comment', 'updated_at'))) {
            $order = 'pv';
        }
        $key = 'content:ranking:'.$order.':'.$limit;
        $list = \wskm\Cache::get($key);

        if (!$list || $w) {
            $list = [];

            $query = (new \yii\db\Query())
                ->from(ContentModel::tableName())
                ->where([
                    'status' => ContentModel::STATUS_PUBLISHED
                ])
                ->orderBy([$order => SORT_DESC])
                ->limit($limit);

            foreach ($query->each() as $item) {
                $list[] = $item;
            }

            $sec = \service\Setting::getConf('cache', 'contentList') !== false ? (int)\service\Setting::getConf('cache', 'contentList') : 0;
            \wskm\Cache::set($key, $list, $sec);
        }

        return $list;
    }

    public static function downloadImgs($html)
    {
        preg_match_all("/<[img|IMG].*?src=[\'|\"](.*?)[\'|\"].*?[\/]?>/", $html, $imgs);
        if (!isset($imgs[1]) || !$imgs[1]) {
            throw new ServerErrorHttpException('Image not found');
        }
        
        $day = date('y_m_d');
        $dir = \Wskm::getUploadPath().$day;
        if (!is_dir($dir)) {
            \yii\helpers\FileHelper::createDirectory($dir);
        }
        
        $newImgs = [];
        foreach ($imgs[1] as $img) {
            if ($img && substr($img, 0, 4) == 'http') {

                $fileExt = \wskm\helpers\File::normalizeExt($img);
                $fileName = md5($img).($fileExt ? '.'.$fileExt : '');

                $file = $dir.DIRECTORY_SEPARATOR.$fileName;
                $urlFile = $day.'/'.$fileName;
                $newImgs[$urlFile] = $img;

                if (file_exists($file)) {
                    continue;
                }

                try {
                    $img = \wskm\helpers\Curl::normalizeUrl($img);
                    $data = \wskm\helpers\Curl::get($img);
                    if ($data) {
                        file_put_contents($file, $data);
                    }
                } catch (\Exception $ex) {
                    throw $ex;
                }
            }
        }

        $uploadDir = \Wskm::getUploadUrl();
        foreach ($newImgs as $newimg => $img) {
            $html = str_replace($img, $uploadDir.$newimg, $html);
        }

        return $html;
    }

    public static function getUrlPrevious($id)
    {
        return (new \yii\db\Query())
                ->select(['id', 'title'])
                ->from(ContentModel::tableName())
                ->where(['>', 'id', $id])
                ->andWhere(['status' => ContentModel::STATUS_PUBLISHED])
                ->limit(1)
                ->orderBy(['id' => SORT_ASC])
                ->one();
    }

    public static function getUrlNext($id)
    {
        return (new \yii\db\Query())
                ->select(['id', 'title'])
                ->from(ContentModel::tableName())
                ->where(['<', 'id', $id])
                ->andWhere(['status' => ContentModel::STATUS_PUBLISHED])
                ->limit(1)
                ->orderBy(['id' => SORT_DESC])
                ->one();
    }

    public static function getListByPage($page, $pageSize = '', $params = [])
    {
        $query = ContentModel::find();

        if (isset($params['category_id'])) {
            $category_id = (int)$params['category_id'];
            $category = Category::getInfo($category_id);
            if (!$category['status']) {
                throw new \yii\web\HttpException(500, \Wskm::t('This category has been disabled', 'frontend'));
            }

            $childIds = Category::getChilds($category_id);
            $childIds[] = $category_id;

            $query->where(['in', 'category_id', $childIds]);
        }

        $query->andWhere([
            'status' => ContentModel::STATUS_PUBLISHED
        ]);

        $query->orderBy([
            isset($params['order']) ? $params['order'] : 'id' => SORT_DESC
        ]);

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);

        if (!$pageSize) {
            $pages->defaultPageSize = \service\Setting::getParamConf('pageSize') ? \service\Setting::getParamConf('pageSize') : 20;
        } else {
            $pages->defaultPageSize = $pageSize;
        }

        $list = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->asArray()->all();

        return [
            'list' => $list,
            'pages' => $pages
        ];
    }

    public static function getListByCategoryid($categoryid, $limit = 20)
    {
        $list = [];
        $cateIds = Category::getChilds($categoryid);

        $cateIds[] = $categoryid;

        $query = (new \yii\db\Query())
            ->from(ContentModel::tableName())
            ->where(['in', 'category_id', $cateIds])
            ->andWhere([
                'status' => ContentModel::STATUS_PUBLISHED
            ])
            ->orderBy('id DESC')
            ->limit($limit);

        foreach ($query->each() as $item) {
            $list[] = $item;
        }

        return $list;
    }

    public static function setCache($category_id, $limit = 20)
    {
        if (!$category_id) {
            return false;
        }

        $key = self::CACHE_KEY_PRE.$category_id.':'.$limit;
        $list = self::getListByCategoryid($category_id, $limit);
        $sec = \service\Setting::getConf('cache', 'contentList') !== false ? (int)\service\Setting::getConf('cache', 'contentList') : 0;
        \wskm\Cache::set($key, $list, $sec);

        return \wskm\Cache::get($key);
    }

    public static function getCache($category_id, $limit = 20, $w = false)
    {
        if (\service\Setting::getConf('cache', 'refreshCache')) {
            $w = true;
        }
        $data = \wskm\Cache::get(self::CACHE_KEY_PRE.$category_id.':'.$limit);
        if ($data === false || $w) {
            $data = self::setCache($category_id, $limit);
        }

        return $data;
    }

}

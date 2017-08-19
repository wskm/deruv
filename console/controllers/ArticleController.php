<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\Content;
use common\models\Article;

set_time_limit(0);

class ArticleController extends Controller
{

    public function actionImportRss($file)
    {
        if (!is_file($file)) {
            echo 'File does not exist!';
            exit(1);
        }
        defined('NO_LOG') or define('NO_LOG', true);

        $content = file_get_contents($file);
        $xml = \wskm\feed\Parser::rss2($content);

        $downErrors = [];
        foreach ($xml as $key => $row) {
            if (!$row['title'] || !$row['description']) {
                echo 'Not found title or description!';
                exit(1);
            }

            $content = Content::findOne([
                    'title' => $row['title']
            ]);
            if (!$content) {
                $content = new Content();
            }

            $content->category_id = 1;
            $content->user_id = 1;
            $content->user_name = 'admin';
            $content->title = $row['title'];
            $content->updated_at = strtotime($row['pubDate']);
            $content->created_at = strtotime($row['pubDate']);
            $content->status = Content::STATUS_PUBLISHED;
            $ok = $content->save();
            if ($ok === false) {
                throw new \Exception('content save:'.var_export($content->errors, true));
            }

            if ($ok !== false) {
                $article = Article::findOne([
                        'content_id' => $content->id,
                ]);
                if (!$article) {
                    $article = new Article();
                }

                $article->content_id = $content->id;
                $article->updated_at = strtotime($row['pubDate']);
                $article->created_at = strtotime($row['pubDate']);

                $html = $this->download($row['description'], $article->created_at);
                if ($html) {
                    $article->detail = $html;
                } else {
                    $downErrors[] = $key."\t:\t".$row['title'];
                }

                $ok = $article->save();
                if ($ok === false) {
                    throw new \Exception('article save:'.var_export($article->errors, true));
                }
            }

            echo "ok:{$key}:".$row['title']."\n";
        }

        echo "\ndownload errors:".var_export($downErrors, true);
        echo "\nend";
        exit(0);
    }

    private function download($html, $created_at)
    {
        /*
          preg_match_all("/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.jpeg|\.png]))[\'|\"].*?[\/]?>/", $html, $imgs);
         */
        preg_match_all("/<[img|IMG].*?src=[\'|\"](.*?)[\'|\"].*?[\/]?>/", $html, $imgs);
        if (!isset($imgs[1])) {
            return false;
        }

        $day = date('y_m_d', $created_at);
        $newImgs = [];
        foreach ($imgs[1] as $img) {
            if ($img && substr($img, 0, 4) == 'http') {
                echo "img:\t{$img}\n";

                $dir = Yii::getAlias('@frontend/web/uploads/spider/'.$day);
                if (!is_dir($dir)) {
                    \yii\helpers\FileHelper::createDirectory($dir);
                }

                $fileExt = str_replace(['?', '|'], '', pathinfo($img, PATHINFO_EXTENSION));
                $fileName = md5($img).($fileExt ? '.'.$fileExt : '');
                
                $file = $dir.DIRECTORY_SEPARATOR.$fileName;
                $urlFile = $day.'/'.$fileName;
                $newImgs[$urlFile] = $img;

                if (file_exists($file)) {
                    continue;
                }

                echo "down\t";
                try {
                    $data = \wskm\helpers\Curl::get($img);
                    if ($data) {
                        file_put_contents($file, $data);
                        echo "ok\n";
                    }else{
                        echo "empty\n";
                    }
                } catch (\Exception $ex) {
                    echo $ex->getMessage()."\n";
                    return false;
                }
            }
        }

        $frontendUrl = \service\Setting::getParamConf('webUrl');
        $uploadDir = rtrim($frontendUrl, '/').'/uploads/spider/';
        foreach ($newImgs as $newimg => $img) {
            $html = str_replace($img, $uploadDir.$newimg, $html);
        }

        return $html;
    }

}

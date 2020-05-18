<?php

namespace service;

use Yii;
use common\models\Category as CategoryModel;
use wskm\helpers\Tree;

class Category
{
    const CACHE_ALL = 'category:all';
    const CACHE_TREE = 'category:tree';
    const CACHE_CHILDS = 'category:childs';
    const CACHE_PARENTS = 'category:parents';
    const CACHE_OPTIONS = 'category:options';

    private static $tree;

    public static function loadTree()
    {
        if (!is_object(self::$tree)) {
            self::$tree = new Tree();
            self::$tree->setTree(self::getList(), 'id', 'parentid', 'name');
        }

        return self::$tree;
    }
    
    public static function getTreeList($root = 0, $layer = 0, $except = null)
    {
        return self::loadTree()->getTreeList($root, $layer, $except);
    }

    public static function getArrayList($root = 0, $layer = 0)
    {
        return self::loadTree()->getArrayList($root, $layer);
    }

    public static function getListOptionsByDb($showTop = true, $exceptid = false)
    {
        return self::loadTree()->getOptions(0, 0, $exceptid, '&nbsp;&nbsp;&nbsp;', $showTop ? 'Top' : '');
    }

    public static function getListOptions($showTop = true, $exceptid = false, $w = false)
    {
        $list = $showOption = [];
        if($showTop){
            $showOption = [0 => \Wskm::t('Category Top')];
        }
        if(\wskm\Cache::get(self::CACHE_OPTIONS)){
            $list = $showOption + (array)\wskm\Cache::get(self::CACHE_OPTIONS);
        }
                
        if(!$w && $list){
            return $list;
        }

        $data = self::getCache(self::CACHE_CHILDS);
        $options = [];
        $childs = isset($data[0]) ? $data[0] : '';
        
        $getLayer = function($id, $space = false) {
            return $space ? str_repeat($space, abs(self::getInfo($id)['level'])) : '';
        };

        $layer = 0;
        foreach ($childs as $id) {
            if ($exceptid && ($id == $exceptid || in_array($id, self::getChilds($exceptid)))) {
                continue;
            }
            $info = self::getInfo($id);

            if ($id > 0 && ($layer <= 0 || $getLayer($id) <= $layer)) {
                $options[$id] = $getLayer($id, '&nbsp;&nbsp;&nbsp;').$info['name'];
            }
        }

        \wskm\Cache::set(self::CACHE_OPTIONS, $options);

        if ($showTop) {
            $options = $showOption + $options;
        }

        return $options;
    }

    public static function getList($isEnable = false)
    {
        $list = [];
        $query = (new \yii\db\Query())
            ->from(CategoryModel::tableName())
            ->orderBy('parentid,sorting DESC');

        if ($isEnable) {
            $query->where([
                'status' => CategoryModel::STATUS_ENABLE,
            ]);
        }

        foreach ($query->each() as $item) {
            $list[$item['id']] = $item;
        }

        return $list;
    }

    public static function getParents($id)
    {
        return isset(self::getCache(self::CACHE_PARENTS)[$id]) ?
            self::getCache(self::CACHE_PARENTS)[$id] : [];
    }

    public static function getChilds($id)
    {
        return isset(self::getCache(self::CACHE_CHILDS)[$id]) ?
            self::getCache(self::CACHE_CHILDS)[$id] : [];
    }

    public static function getInfo($id)
    {
        if (!$id) {
            return false;
        }
        return isset(self::getCache(self::CACHE_ALL)[$id]) ? 
            self::getCache(self::CACHE_ALL)[$id] : false;
    }

    public static function getInfoName($id)
    {
        $info = self::getInfo($id);

        return $info ? $info['name'] : '';
    }

    public static function setCache($key = self::CACHE_TREE)
    {
        if (!$key) {
            return false;
        }
        $list = self::getList(true);
        $tree = new Tree();
        $tree->setTree($list, 'id', 'parentid', 'name');
        
        \wskm\Cache::set(self::CACHE_ALL, self::getList(false));
        \wskm\Cache::set(self::CACHE_TREE, $tree->getTreeList());
        \wskm\Cache::set(self::CACHE_CHILDS, $tree->getChildList());
        \wskm\Cache::set(self::CACHE_PARENTS, $tree->getParentList());

        self::getListOptions(false, false, true);

        return \wskm\Cache::get($key);
    }

    public static function getCache($key = self::CACHE_TREE, $w = false)
    {
        $data = \wskm\Cache::get($key);
        if ($data === false || $w) {
            
            $data = self::setCache($key);
        }

        return $data;
    }

}

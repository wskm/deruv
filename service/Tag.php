<?php

namespace service;

use Yii;
use Wskm;
use common\models\Tag as TagModel;
use common\models\ContentTag;
use wskm\helpers\ArrayHelper;
use yii\web\ServerErrorHttpException;
use yii\db\Query;

class Tag
{

    public static function filterTag($txt) {
        $txt = trim($txt);
        $txt = str_replace([chr(0xa3).chr(0xac), chr(0xa1).chr(0x41), chr(0xef).chr(0xbc).chr(0x8c)], ',', $txt);
        $list = array();
        if (strpos($txt, ',') !== false) {
            $list = explode(',', $txt);
        } else {
            $txt = str_replace([chr(0xa1).chr(0xa1), chr(0xa1).chr(0x40), chr(0xe3).chr(0x80).chr(0x80)], ' ', $txt);
            $list = explode(' ', $txt);
        }

        return array_filter(array_map('trim', array_unique($list)));
    }
    
    public static function getTags($txt)
    {
        return array_slice(self::filterTag($txt), 0, 5);
    }
    
    public static function update($contentId, $txt = '', $OldTxt = '') {
        $tags = ArrayHelper::num2Assoc(self::getTags($txt));
        if (!$tags) {
            return ContentTag::deleteAll([
                    'content_id' => $contentId
            ]);
        }

        $oldTags = [];
        if ($OldTxt) {
            $oldTags = ArrayHelper::num2Assoc(self::getTags($OldTxt));
        } else {
            $query = (new Query())->select('t.*')->from(ContentTag::tableName().' ct')->leftJoin(TagModel::tableName().' t', 'ct.tag_id = t.id')->where(['content_id' => $contentId]);
            foreach ($query->each(20) as $tmp) {
                $oldTags[$tmp['name']] = 1;
            }
        }

        if ($tags == $oldTags) {
            return true;
        }

        foreach ($tags as $tag => $v) {

            if (!isset($oldTags[$tag])) {
                $tempTag = TagModel::findOne(['name' => $tag]);
                if (!$tempTag) {
                    $tempTag = new TagModel();
                    $tempTag->name = "$tag";
                    $tempTag->status = TagModel::STATUS_ENABLED;
                    $ok = $tempTag->save();
                    if (!$ok) {
                        throw new ServerErrorHttpException(var_export($tempTag->getErrors(), true));
                    }
                } else {
                    //count+1
                }

                $tempContentTag = new ContentTag();
                $tempContentTag->content_id = $contentId;
                $tempContentTag->tag_id = $tempTag->id;
                $ok = $tempContentTag->save();
                if (!$ok) {
                    throw new ServerErrorHttpException(var_export($tempTag->getErrors(), true));
                }
            }
            
        }

        foreach ($oldTags as $tag => $v) {
            if (!isset($tags[$tag])) {
                $tempTag = TagModel::findOne(['name' => $tag]);
                if (!$tempTag) {
                    continue;
                }

                ContentTag::deleteAll([
                    'content_id' => $contentId,
                    'tag_id' => $tempTag->id,
                ]);

                if (!ContentTag::find()->where(['tag_id' => $tempTag->id])
                        ->andWhere(['!=', 'content_id', $contentId])->count()) {
                    $ok = $tempTag->delete();
                    if ($ok === false) {
                        throw new ServerErrorHttpException(var_export($tempTag->getErrors(), true));
                    }
                } else {
                    //count-1
                }
            }
        }

        return implode(',', $tags);
    }

}

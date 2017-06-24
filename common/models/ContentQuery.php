<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Content]].
 *
 * @see Content
 */
class ContentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Content[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Content|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

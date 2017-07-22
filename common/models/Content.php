<?php

namespace common\models;

use Yii;
use wskm\db\AdminAR;
use common\models\Article;
use common\models\User;

/**
 * This is the model class for table "{{%content}}".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $user_id
 * @property string $user_name
 * @property string $thumb
 * @property string $title
 * @property string $summary
 * @property integer $pv
 * @property integer $comment
 * @property integer $iscomment
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Content extends AdminAR
{
	const STATUS_UNPUBLISHED = 0;
	const STATUS_PUBLISHED = 1;
	const STATUS_AUDIT = 2;

	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%content}}';
    }
	
	public static function getListStatus()
	{
		return [
			\Wskm::t('Unpublished', 'admin'),
			\Wskm::t('Published', 'admin'),
			\Wskm::t('Audit', 'admin'),
		];
	}
	
	public function primaryName() {
        return $this->title;
    }
	
	public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    AdminAR::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    //ActiveRecord::EVENT_BEFORE_UPDATE => [],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'user_id', 'user_name', 'title'], 'required'],
            [['category_id', 'user_id', 'pv', 'comment', 'iscomment', 'status', 'created_at' ], 'integer'],
            [['user_name', 'thumb', 'title', 'summary'], 'string', 'max' => 255],
			[['status'], 'default', 'value' => 0 ],
			[['title'], 'unique', 'targetAttribute' => ['category_id', 'title']],
			['updated_at', 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('admin', 'Category'),
            'user_id' => Yii::t('app', 'User ID'),
            'user_name' => Yii::t('app', 'User Name'),
            'thumb' => Yii::t('app', 'Thumb'),
            'title' => Yii::t('app', 'Title'),
            'summary' => Yii::t('app', 'Summary'),
            'pv' => Yii::t('app', 'Pv'),
            'comment' => Yii::t('app', 'Comment'),
			'iscomment' => Yii::t('admin', 'Is Comment'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return ContentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContentQuery(get_called_class());
    }

	public function getArticle()
    {
        return $this->hasOne(Article::className(), ['content_id' => 'id']);
    }
    
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}

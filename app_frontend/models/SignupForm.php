<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $passwordConfirm;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('user', 'This username has already been taken.')],
            ['username', 'string', 'min' => 4, 'max' => 255],
            ['username', 'match', 'pattern' => '/^[a-z]\w*$/i'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('user', 'This email address has already been taken.')],

            [['password', 'passwordConfirm' ], 'required'],
            ['password', 'string', 'min' => 4],
            [['password'], 'filter', 'filter' => 'trim'],
            [['passwordConfirm'], 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('user', 'Passwords do not match')],

        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
    
    public function attributeLabels()
    {
        return [
            'username' => \Wskm::t('User Name'),
            'password' => \Wskm::t('Password'),
            'passwordConfirm' => Yii::t('user', 'New Password Confirm'),
        ];
    }
}

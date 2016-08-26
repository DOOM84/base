<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;



/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property integer $status
 * @property string $auth_key
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_NOT_ACTIVE = 1;
    const STATUS_ACTIVE = 10;
    
    public $password;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'filter', 'filter' => 'trim'],
            [['username', 'email', 'status'], 'required'],
            ['email', 'email'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['password', 'required', 'on' => 'create'],
            ['username', 'unique', 'message' => 'Это имя занято.'],
            ['email', 'unique', 'message' => 'Эта почта уже зарегистрирована.']
            
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password Hash',
            'status' => 'Status',
            'auth_key' => 'Auth Key',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    

   
   public function behaviors()
{
    return [
        TimestampBehavior::className(),
    ];
}
   
   public function findByUsername($username){
       return User::findOne([
          'username' => $username
       ]);
   } 
    
    
   public function setPassword($password){
     return  $this->password_hash = Yii::$app->security->generatePasswordHash($password);
   }
   
   
   public function generateAuthKey(){
       
      return $this->auth_key = Yii::$app->security->generateRandomString();
   }
   
   public function validatePassword($password){
       
       return Yii::$app->security->validatePassword($password, $this->password_hash);
   }
   
    
     public static function findIdentity($id)
    {
        return User::findOne(
                ['id' => $id, 'status' => self::STATUS_ACTIVE
                ]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return User::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }
}

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\models;
use yii\base\Model;
use Yii;
class RegForm extends Model{
    public $username;
    public $email;
    public $password;
    public $status;
    
    public function rules() {
        return [
            [['username', 'email', 'password'], 'filter', 'filter' => 'trim'],
            [['username', 'email', 'password'], 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['password', 'string', 'min' => 6, 'max' => 255],
            ['username', 'unique', 'targetClass' => User::className(), 
                'message' => 'Это имя занято.'],
            ['email', 'email'],
            ['email', 'unique', 
              'targetClass' => User::className(),
                'message' => 'Эта почта уже зарегистрирована'],
            ['status', 'default', 'value' => User::STATUS_ACTIVE, 'on' => 'default'],
            ['status', 'in', 'range' => [User::STATUS_NOT_ACTIVE,
                User::STATUS_ACTIVE
                ]],
            

            
            
        ];
    }
    
   public function attributeLabels(){
       return [
           'username' => 'Имя пользователя',
           'email' => 'Эл. почта',
           'password' => 'Пароль',
           
       ];
   }
   public function reg(){
      $user = new User();
      $user->username = $this->username;
      $user->email = $this->email;
      $user->status = $this->status;
      $user->setPassword($this->password);
      $user->generateAuthKey();
      $user-> created_at = $this->behaviors();
      $user-> updated_at = $this->behaviors();
      
     return $user->save() ? $user : null;
      
      
   }
    
}


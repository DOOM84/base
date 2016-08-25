<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\models;
use yii\base\Model;
use Yii;
class LoginForm extends Model{
    public $username;
    public $password;
    
    public function rules() {
        return [
            [
             ['username', 'password'],
                'required'
            ]
        ];
    }
    public function attributeLabels(){
       return [
           'username' => 'Имя пользователя',
           'password' => 'Пароль',
           
       ];
   } 
}


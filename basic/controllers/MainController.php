<?php
namespace app\controllers;

use Yii;
use app\models\RegForm;
use app\models\LoginForm;

class MainController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $hello = 'Привет, МИР!!!';
        return $this->render(
                'index',
                [
                    'hello' => $hello
                    ]);
    }
    
    public function actionReg(){
        $model = new RegForm();
        if (Yii::$app->request->post()):
           echo '<pre>';
           print_r(Yii::$app->request->post());
           echo '<pre>';
           Yii::$app->end();
        endif;
        return $this->render(
                'reg', 
                ['model' => $model]
                
                );
        
    }
    
    public function actionLogin(){
        $model = new LoginForm();
        
        if (Yii::$app->request->post()):
           echo '<pre>';
           print_r(Yii::$app->request->post());
           echo '</pre>';
           Yii::$app->end();
        endif;
        
        return $this->render(
                'login', 
                ['model' => $model]
                
                );
        
    }
    
    public function actionSearch()
    {
       $search = Yii::$app->request->post('search');
       return $this->render(
               'search', 
               ['search' => $search]
               );}

}

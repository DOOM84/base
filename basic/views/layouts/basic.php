<?php
use app\assets\AppAsset;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\components\AlertWidget;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* @var $content string
 @var $this \yii\web\View */
AppAsset::register($this);
$this->beginPage();
?>
<!doctype html>
<html lang="<?= Yii::$app->language?>">
    <head>
        <?= Html::csrfMetaTags()?>
        <meta charset="<?= Yii::$app->charset?>">
        <?php $this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1']) ?>
        <title><?= Yii::$app->name?></title>
        <?php $this->head(); ?>
    </head>
    <body>
        <?php $this->beginBody(); ?>
        <div class="wrap">
           <?php
            Navbar::begin(
                   [
                       'brandLabel' => 'Тестовое приложение',
                       
                   ]
                   );
            
            $menuItems = [
                [
                       'label' => 'Из коробки <span class="glyphicon glyphicon-inbox"></span>',
                    'items' => [
                   '<li class = "dropdown-header">Расширения</li>',
                   '<li class = "divider"></li>',
                       
                       [
                           'label' => 'Перейти к просмотру',
                           'url' => ['/widget-test/index']
                       ]
                   ]
                       ],
                    [
                       'label' => 'О проекте <span class="glyphicon glyphicon-question-sign"></span>',
                   'url' => ['#'],
                       'linkOptions' => [
                           'data-toggle' => 'modal',
                           'data-target' => '#modal',
                           'style' => 'cursor:pointer; outline: none;'
                           
                       ], 
                       ],
            ];
           
            if (Yii::$app->user->isGuest):
                $menuItems[] = ['label' => 'Регистрация', 
                    'url' => ['/main/reg']];
             $menuItems[] = ['label' => 'Войти', 
                 'url' => ['/main/login']];
             else:
               $menuItems[] = ['label' => 'Выйти('.Yii::$app->user->identity['username'].')',
                   'url' => ['/main/logout'],
                   'linkOptions' => ['data-method' => 'post']
                   
                               ];
            endif;
                
                
                
                
                
           echo Nav::widget([
               'items' => $menuItems,
               'activateParents' => true,
               'encodeLabels' => false,
               'options' => [
                   'class' => 'navbar-nav navbar-right'
                   ]
           ]);
           Modal::begin([
               'header' => '<h2>DOOM<h2>',
               'id' => 'modal'
           ]);
           echo 'Проект для продвинутых PHP разработчиков';
           Modal::end();
           
           ActiveForm::begin(
                   [
                       'action' => ['/main/search'],
                       'method' => 'post',
                       'options' => [
                           'class' => 'navbar-form navbar-right'
                           ]
                   ]
                   );
           echo '<div class="input-group input-group-sm">';
           echo Html::input(
                   'type: text',
                   'search',
                   '',
                   ['placeholder' => 'Найти...',
                       'class' => 'form-control']
                   );
           echo '<span class="input-group-btn">';
           echo Html::submitButton(
                  '<span class="glyphicon glyphicon-search"></span>', 
           ['class' => 'btn btn-success']
                   );
           echo '</span></div>';
           ActiveForm::end();
           
           Navbar::end();
           ?>
            <div class="container">
                <?= $content;?>
                
            </div>  
        </div>
        
        <footer class="footer">
            <div class="container">
                <span class="badge">
                    <span class="glyphicon glyphicon-copyright-mark"></span> 
                    DOOM <?= date("Y")?>
                </span>
            </div>
        </footer>
        
       
        <?php $this->endBody(); ?>
    </body>
</html>
<?php
$this->endPage();

<?php
use app\assets\AppAsset;
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
        <meta charset="<?= Yii::$app->charset?>">
        <?php $this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1']) ?>
        <title><?= Yii::$app->name?></title>
        <?php $this->head(); ?>
    </head>
    <body>
        <?php $this->beginBody(); ?>
        <p>Верхняя часть сайта</p>
        <?= $content?>
        <p>Нижняя часть сайта</p>
        <?php $this->endBody(); ?>
    </body>
</html>
<?php
$this->endPage();

<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
echo Html::a(
        'Передать сюда id = 123',
        Url::to(['widget-test/index', 'id' => '123'])
        );
if(isset($_GET['id']))
    echo '<p>'.$_GET['id'].'<p>';
?>


<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\modules\sakila\models\FilmText $model
*/

$this->title = 'Film Text ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Film Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->title, 'url' => ['view', 'film_id' => $model->film_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="film-text-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List'), ['index'], ['class'=>'btn btn-default']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'Edit'), ['update', 'film_id' => $model->film_id],['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . '
        Film Text', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="clearfix"></div>

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>


    
    <h3>
        <?= $model->title ?>    </h3>


    <?php $this->beginBlock('app\modules\sakila\models\FilmText'); ?>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
    			'film_id',
			'title',
			'description:ntext',
    ],
    ]); ?>

    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('app', 'Delete'), ['delete', 'film_id' => $model->film_id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . Yii::t('app', 'Are you sure to delete this item?') . '',
    'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> FilmText',
    'content' => $this->blocks['app\modules\sakila\models\FilmText'],
    'active'  => true,
], ]
                 ]
    );
    ?></div>

<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\modules\sakila\models\Actor $model
*/

$this->title = 'Actor ' . $model->actor_id;
$this->params['breadcrumbs'][] = ['label' => 'Actors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->actor_id, 'url' => ['view', 'actor_id' => $model->actor_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="actor-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List'), ['index'], ['class'=>'btn btn-default']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'Edit'), ['update', 'actor_id' => $model->actor_id],['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . '
        Actor', ['create'], ['class' => 'btn btn-success']) ?>
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
        <?= $model->label ?>    </h3>


    <?php $this->beginBlock('app\modules\sakila\models\Actor'); ?>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
    			'actor_id',
			'first_name',
			'last_name',
			'last_update',
    ],
    ]); ?>

    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('app', 'Delete'), ['delete', 'actor_id' => $model->actor_id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . Yii::t('app', 'Are you sure to delete this item?') . '',
    'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('Films'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top 0px;'>
  <?= Html::a(
            '<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List All') . ' Films',
            ['film/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Film',
            ['film/create', 'Film' => ['film_id' => $model->actor_id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-link"></span> ' . Yii::t('app', 'Attach') . ' Film', ['film-actor/create', 'FilmActor'=>['actor_id'=>$model->actor_id]],
            ['class'=>'btn btn-info btn-xs']
        ) ?>
</div></div><?php Pjax::begin(['id'=>'pjax-Films', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-Films ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?= '<div class="table-responsive">'.\yii\grid\GridView::widget([
    'layout' => '{summary}{pager}<br/>{items}{pager}',
    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getFilmActors(), 'pagination' => ['pageSize' => 20, 'pageParam'=>'page-filmactors']]),
    'pager'        => [
        'class'          => yii\widgets\LinkPager::className(),
        'firstPageLabel' => Yii::t('app', 'First'),
        'lastPageLabel'  => Yii::t('app', 'Last')
    ],
    'columns' => [[
    'class'      => 'yii\grid\ActionColumn',
    'template'   => '{view} {delete}',
    'contentOptions' => ['nowrap'=>'nowrap'],
    'urlCreator' => function($action, $model, $key, $index) {
        // using the column name as key, not mapping to 'id' like the standard generator
        $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
        $params[0] = 'film-actor' . '/' . $action;
        return Url::toRoute($params);
    },
    'buttons'    => [
        'delete' => function ($url, $model) {
                return yii\helpers\Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                    'class' => 'text-danger',
                    'title'         => Yii::t('app', 'Remove'),
                    'data-confirm'  => Yii::t('app', 'Are you sure you want to delete the related item?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ]);
            },
'view' => function ($url, $model) {
                return yii\helpers\Html::a(
                    '<span class="glyphicon glyphicon-cog"></span>',
                    $url,
                    [
                        'data-title'  => Yii::t('app', 'View Pivot Record'),
                        'data-toggle' => 'tooltip',
                        'data-pjax'   => '0',
                        'class'       => 'text-muted',
                    ]
                );
            },
    ],
    'controller' => 'film-actor'
],// generated by schmunk42\giiant\crud\providers\RelationProvider::columnFormat
[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "film_id",
            "value" => function($model){
                if ($rel = $model->getFilm()->one()) {
                    return yii\helpers\Html::a($rel->title,["film/view", 'film_id' => $rel->film_id,],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
			'last_update',
]
]).'</div>'?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> Actor',
    'content' => $this->blocks['app\modules\sakila\models\Actor'],
    'active'  => true,
],[
    'label'   => '<small><span class="glyphicon glyphicon-paperclip"></span> Films</small>',
    'content' => $this->blocks['Films'],
    'active'  => false,
], ]
                 ]
    );
    ?></div>

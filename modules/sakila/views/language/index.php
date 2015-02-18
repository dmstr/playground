<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var app\modules\sakila\models\search\Language $searchModel
*/

    $this->title = 'Languages';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="language-index">

    <?php //     echo $this->render('_search', ['model' =>$searchModel]);
    ?>

    <div class="clearfix">
        <p class="pull-left">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Language', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <div class="pull-right">


                                                    
            <?= 
            \yii\bootstrap\ButtonDropdown::widget(
                [
                    'id'       => 'giiant-relations',
                    'encodeLabel' => false,
                    'label'    => '<span class="glyphicon glyphicon-paperclip"></span> ' . Yii::t('app', 'Relations'),
                    'dropdown' => [
                        'options'      => [
                            'class' => 'dropdown-menu-right'
                        ],
                        'encodeLabels' => false,
                        'items'        => [
    [
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Film</i>',
        'url' => [
            'film/index',
        ],
    ],
]                    ],
                ]
            );
            ?>        </div>
    </div>

    
        <div class="table-responsive">
        <?= GridView::widget([
        'layout' => '{summary}{pager}{items}{pager}',
        'dataProvider' => $dataProvider,
        'pager'        => [
            'class'          => yii\widgets\LinkPager::className(),
            'firstPageLabel' => Yii::t('app', 'First'),
            'lastPageLabel'  => Yii::t('app', 'Last')        ],
        'filterModel' => $searchModel,
        'columns' => [

        [
    'class' => 'yii\grid\ActionColumn',
    'urlCreator' => function($action, $model, $key, $index) {
        // using the column name as key, not mapping to 'id' like the standard generator
        $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
        $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
        return Url::toRoute($params);
    },
    'contentOptions' => ['nowrap'=>'nowrap']
],
			'language_id',
			'name',
			'last_update',
        ],
    ]); ?>
        </div>

    
</div>

<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\sakila\models\FilmCategory $model
 */

$this->title = 'Film Category ' . $model->film_id . ', ' . Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Film Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->film_id, 'url' => ['view', 'film_id' => $model->film_id, 'category_id' => $model->category_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="film-category-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . Yii::t('app', 'View'), ['view', 'film_id' => $model->film_id, 'category_id' => $model->category_id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

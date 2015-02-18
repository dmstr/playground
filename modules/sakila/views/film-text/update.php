<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\sakila\models\FilmText $model
 */

$this->title = 'Film Text ' . $model->title . ', ' . Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Film Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->title, 'url' => ['view', 'film_id' => $model->film_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="film-text-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . Yii::t('app', 'View'), ['view', 'film_id' => $model->film_id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\sakila\models\City $model
 */

$this->title = 'City ' . $model->city_id . ', ' . Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Cities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->city_id, 'url' => ['view', 'city_id' => $model->city_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="city-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . Yii::t('app', 'View'), ['view', 'city_id' => $model->city_id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

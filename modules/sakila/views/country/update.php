<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\sakila\models\Country $model
 */

$this->title = 'Country ' . $model->country_id . ', ' . Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->country_id, 'url' => ['view', 'country_id' => $model->country_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="country-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . Yii::t('app', 'View'), ['view', 'country_id' => $model->country_id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

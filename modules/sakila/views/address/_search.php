<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\sakila\models\search\Address $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="address-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'address_id') ?>

		<?= $form->field($model, 'address') ?>

		<?= $form->field($model, 'address2') ?>

		<?= $form->field($model, 'district') ?>

		<?= $form->field($model, 'city_id') ?>

		<?php // echo $form->field($model, 'postal_code') ?>

		<?php // echo $form->field($model, 'phone') ?>

		<?php // echo $form->field($model, 'last_update') ?>

		<div class="form-group">
			<?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

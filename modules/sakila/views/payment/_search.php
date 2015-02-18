<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\sakila\models\search\Payment $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="payment-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'payment_id') ?>

		<?= $form->field($model, 'customer_id') ?>

		<?= $form->field($model, 'staff_id') ?>

		<?= $form->field($model, 'rental_id') ?>

		<?= $form->field($model, 'amount') ?>

		<?php // echo $form->field($model, 'payment_date') ?>

		<?php // echo $form->field($model, 'last_update') ?>

		<div class="form-group">
			<?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\sakila\models\search\Staff $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="staff-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'staff_id') ?>

		<?= $form->field($model, 'first_name') ?>

		<?= $form->field($model, 'last_name') ?>

		<?= $form->field($model, 'address_id') ?>

		<?= $form->field($model, 'picture') ?>

		<?php // echo $form->field($model, 'email') ?>

		<?php // echo $form->field($model, 'store_id') ?>

		<?php // echo $form->field($model, 'active') ?>

		<?php // echo $form->field($model, 'username') ?>

		<?php // echo $form->field($model, 'password') ?>

		<?php // echo $form->field($model, 'last_update') ?>

		<div class="form-group">
			<?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

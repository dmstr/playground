<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\sakila\models\search\Customer $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="customer-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'customer_id') ?>

		<?= $form->field($model, 'store_id') ?>

		<?= $form->field($model, 'first_name') ?>

		<?= $form->field($model, 'last_name') ?>

		<?= $form->field($model, 'email') ?>

		<?php // echo $form->field($model, 'address_id') ?>

		<?php // echo $form->field($model, 'active') ?>

		<?php // echo $form->field($model, 'create_date') ?>

		<?php // echo $form->field($model, 'last_update') ?>

		<div class="form-group">
			<?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\sakila\models\search\Store $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="store-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'store_id') ?>

		<?= $form->field($model, 'manager_staff_id') ?>

		<?= $form->field($model, 'address_id') ?>

		<?= $form->field($model, 'last_update') ?>

		<div class="form-group">
			<?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

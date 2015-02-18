<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\sakila\models\Payment $model
 */

$this->title = 'Payment ' . $model->payment_id . ', ' . Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->payment_id, 'url' => ['view', 'payment_id' => $model->payment_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="payment-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . Yii::t('app', 'View'), ['view', 'payment_id' => $model->payment_id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\sakila\models\Customer $model
 */

$this->title = 'Customer ' . $model->customer_id . ', ' . Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->customer_id, 'url' => ['view', 'customer_id' => $model->customer_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="customer-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . Yii::t('app', 'View'), ['view', 'customer_id' => $model->customer_id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

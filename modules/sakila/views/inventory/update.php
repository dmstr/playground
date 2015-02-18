<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\sakila\models\Inventory $model
 */

$this->title = 'Inventory ' . $model->inventory_id . ', ' . Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->inventory_id, 'url' => ['view', 'inventory_id' => $model->inventory_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="inventory-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . Yii::t('app', 'View'), ['view', 'inventory_id' => $model->inventory_id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

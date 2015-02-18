<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\sakila\models\Store $model
 */

$this->title = 'Store ' . $model->store_id . ', ' . Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->store_id, 'url' => ['view', 'store_id' => $model->store_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="store-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . Yii::t('app', 'View'), ['view', 'store_id' => $model->store_id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

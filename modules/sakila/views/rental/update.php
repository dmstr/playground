<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\sakila\models\Rental $model
 */

$this->title = 'Rental ' . $model->rental_id . ', ' . Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Rentals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->rental_id, 'url' => ['view', 'rental_id' => $model->rental_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="rental-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . Yii::t('app', 'View'), ['view', 'rental_id' => $model->rental_id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

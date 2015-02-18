<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\sakila\models\Staff $model
 */

$this->title = 'Staff ' . $model->staff_id . ', ' . Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->staff_id, 'url' => ['view', 'staff_id' => $model->staff_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="staff-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . Yii::t('app', 'View'), ['view', 'staff_id' => $model->staff_id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

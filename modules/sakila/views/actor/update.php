<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\sakila\models\Actor $model
 */

$this->title = 'Actor ' . $model->actor_id . ', ' . Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Actors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->actor_id, 'url' => ['view', 'actor_id' => $model->actor_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="actor-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . Yii::t('app', 'View'), ['view', 'actor_id' => $model->actor_id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>

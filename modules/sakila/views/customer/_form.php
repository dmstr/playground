<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\modules\sakila\models\Customer $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="customer-form">

    <?php $form = ActiveForm::begin([
                        'id'     => 'Customer',
                        'layout' => 'horizontal',
                        'enableClientValidation' => false,
                    ]
                );
    ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>
        <?php $this->beginBlock('main'); ?>

        <p>
            
			<?= // generated by schmunk42\giiant\crud\providers\RelationProvider::activeField
$form->field($model, 'store_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(app\modules\sakila\models\Store::find()->all(),'store_id','label'),
    ['prompt' => Yii::t('app', 'Select')]
); ?>
			<?= $form->field($model, 'first_name')->textInput(['maxlength' => 45]) ?>
			<?= $form->field($model, 'last_name')->textInput(['maxlength' => 45]) ?>
			<?= // generated by schmunk42\giiant\crud\providers\RelationProvider::activeField
$form->field($model, 'address_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(app\modules\sakila\models\Address::find()->all(),'address_id','address_id'),
    ['prompt' => Yii::t('app', 'Select')]
); ?>
			<?= $form->field($model, 'create_date')->textInput() ?>
			<?= $form->field($model, 'active')->textInput() ?>
			<?= $form->field($model, 'email')->textInput(['maxlength' => 50]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Customer',
    'content' => $this->blocks['main'],
    'active'  => true,
], ]
                 ]
    );
    ?>
        <hr/>

        <?= Html::submitButton(
                '<span class="glyphicon glyphicon-check"></span> ' . ($model->isNewRecord
                            ? Yii::t('app', 'Create') : Yii::t('app', 'Save')),
                [
                    'id'    => 'save-' . $model->formName(),
                    'class' => 'btn btn-success'
                ]
            );
        ?>


        <?php ActiveForm::end(); ?>

    </div>

</div>

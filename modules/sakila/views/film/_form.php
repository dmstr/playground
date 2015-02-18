<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\modules\sakila\models\Film $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="film-form">

    <?php $form = ActiveForm::begin([
                        'id'     => 'Film',
                        'layout' => 'horizontal',
                        'enableClientValidation' => false,
                    ]
                );
    ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>
        <?php $this->beginBlock('main'); ?>

        <p>
            
			<?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>
			<?= // generated by schmunk42\giiant\crud\providers\RelationProvider::activeField
$form->field($model, 'language_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(app\modules\sakila\models\Language::find()->all(),'language_id','name'),
    ['prompt' => Yii::t('app', 'Select')]
); ?>
			<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'rating')->dropDownList([ 'G' => 'G', 'PG' => 'PG', 'PG-13' => 'PG-13', 'R' => 'R', 'NC-17' => 'NC-17', ], ['prompt' => '']) ?>
			<?= $form->field($model, 'special_features')->textInput(['maxlength' => 0]) ?>
			<?= $form->field($model, 'release_year')->textInput(['maxlength' => 4]) ?>
			<?= // generated by schmunk42\giiant\crud\providers\RelationProvider::activeField
$form->field($model, 'original_language_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(app\modules\sakila\models\Language::find()->all(),'language_id','name'),
    ['prompt' => Yii::t('app', 'Select')]
); ?>
			<?= $form->field($model, 'rental_duration')->textInput() ?>
			<?= $form->field($model, 'length')->textInput() ?>
			<?= $form->field($model, 'rental_rate')->textInput(['maxlength' => 4]) ?>
			<?= $form->field($model, 'replacement_cost')->textInput(['maxlength' => 5]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Film',
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

<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\modules\sakila\models\FilmText $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="film-text-form">

    <?php $form = ActiveForm::begin([
                        'id'     => 'FilmText',
                        'layout' => 'horizontal',
                        'enableClientValidation' => false,
                    ]
                );
    ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>
        <?php $this->beginBlock('main'); ?>

        <p>
            
			<?= $form->field($model, 'film_id')->textInput() ?>
			<?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'FilmText',
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

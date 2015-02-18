<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\modules\sakila\models\Category $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="category-form">

    <?php $form = ActiveForm::begin([
                        'id'     => 'Category',
                        'layout' => 'horizontal',
                        'enableClientValidation' => false,
                    ]
                );
    ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>
        <?php $this->beginBlock('main'); ?>

        <p>
            
			<?= $form->field($model, 'name')->textInput(['maxlength' => 25]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Category',
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

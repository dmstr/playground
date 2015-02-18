<?php

use yii\helpers\Inflector;

?>

<div class="crud-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Module Controllers</h3>
        </div>
        <div class="box-body">
            <?php
            foreach (\Yii::$app->getModule('admin')->getControllers($this->context->module->id) AS $i => $controller) {
                echo yii\helpers\Html::a(
                    Inflector::camel2words(Inflector::id2camel($controller)),
                    ["/{$this->context->module->id}/$controller"],
                    ['class' => 'col-sm-3 btn btn-lg btn-default btn-flat']
                );
            }
            ?>
            <div class="clearfix"></div>
        </div>
        <!-- /.box-body -->
    </div>

</div>

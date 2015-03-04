<?php


\Yii::$container->set(
    'schmunk42\giiant\crud\providers\DateTimeProvider',
    [
        'columnNames' => [
            'rental_date',
            'return_date',
            'payment_date',
        ]
    ]
);


$activeFields = [

    // hide date fields
    'created_at$|update$'           => function () {
        return false;
    },
    /**
     * Generate a checkbox for specific column (model attribute)
     */
    'common\models\Foo.isAvailable' => function ($attribute, $generator) {
        $data = \yii\helpers\VarDumper::export([0 => 'Nein', 1 => 'Ja']);
        return <<<INPUT
\$form->field(\$model, '{$attribute}')->checkbox({$data});
INPUT;
    },

];

$columnFormats = [

    // generate custom HTML in column
    'common\models\Foo.html'  => function ($attribute, $generator) {
        return <<<FORMAT
[
    'format' => 'html',
    'label'=>'FOOFOO',
    'attribute' => 'item_id',
    'value'=> function(\$model){
        return \yii\helpers\Html::a(\$model->bar,['/crud/item/view', 'id' => \$model->link_id]);
    }
]
FORMAT;
    },
    // hide all text fields in grid
    '.+'                      => function ($column, $model) {
        if ($column->dbType == 'text' || $column->dbType == 'mediumblob') {
            return false;
        }
    },
    // hide system fields in grid
    'created_at$|updated_at$' => function () {
        return false;
    },

];

$attributeFormats = [


    // usa a static helper function for all columns ending with `_json`
    '_json$' => function ($attribute, $generator) {
        $formattter = StringFormatter::className();
        return <<<FORMAT
[
    'format' => 'html',
    #'label'=>'FOOFOO',
    'attribute' => '{$attribute->name}',
    'value'=> {$formattter}::contentJsonToHtml(\$model->{$attribute->name})

]
FORMAT;

    },
];

\Yii::$container->set(
    'schmunk42\giiant\crud\providers\CallbackProvider',
    [
        'activeFields'     => $activeFields,
        'columnFormats'    => $columnFormats,
        'attributeFormats' => $attributeFormats,
    ]
);

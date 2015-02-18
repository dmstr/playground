<?php

namespace app\modules\sakila\models\base;

use Yii;

/**
 * This is the base-model class for table "film_text".
 *
 * @property integer $film_id
 * @property string $title
 * @property string $description
 */
class FilmText extends \app\modules\sakila\base\SakilaActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'film_text';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['film_id', 'title'], 'required'],
            [['film_id'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'film_id' => Yii::t('app', 'Film ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
}

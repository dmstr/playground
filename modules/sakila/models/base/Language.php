<?php

namespace app\modules\sakila\models\base;

use Yii;

/**
 * This is the base-model class for table "language".
 *
 * @property integer $language_id
 * @property string $name
 * @property string $last_update
 *
 * @property \app\modules\sakila\models\Film[] $films
 */
class Language extends \app\modules\sakila\base\SakilaActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['last_update'], 'safe'],
            [['name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'language_id' => Yii::t('app', 'Language ID'),
            'name' => Yii::t('app', 'Name'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilms()
    {
        return $this->hasMany(\app\modules\sakila\models\Film::className(), ['original_language_id' => 'language_id']);
    }
}

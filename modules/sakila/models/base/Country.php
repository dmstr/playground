<?php

namespace app\modules\sakila\models\base;

use Yii;

/**
 * This is the base-model class for table "country".
 *
 * @property integer $country_id
 * @property string $country
 * @property string $last_update
 *
 * @property \app\modules\sakila\models\City[] $cities
 */
class Country extends \app\modules\sakila\base\SakilaActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country'], 'required'],
            [['last_update'], 'safe'],
            [['country'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'country_id' => Yii::t('app', 'Country ID'),
            'country' => Yii::t('app', 'Country'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(\app\modules\sakila\models\City::className(), ['country_id' => 'country_id']);
    }
}

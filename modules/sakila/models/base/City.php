<?php

namespace app\modules\sakila\models\base;

use Yii;

/**
 * This is the base-model class for table "city".
 *
 * @property integer $city_id
 * @property string $city
 * @property integer $country_id
 * @property string $last_update
 *
 * @property \app\modules\sakila\models\Address[] $addresses
 * @property \app\modules\sakila\models\Country $country
 */
class City extends \app\modules\sakila\base\SakilaActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city', 'country_id'], 'required'],
            [['country_id'], 'integer'],
            [['last_update'], 'safe'],
            [['city'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'city_id' => Yii::t('app', 'City ID'),
            'city' => Yii::t('app', 'City'),
            'country_id' => Yii::t('app', 'Country ID'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(\app\modules\sakila\models\Address::className(), ['city_id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(\app\modules\sakila\models\Country::className(), ['country_id' => 'country_id']);
    }
}

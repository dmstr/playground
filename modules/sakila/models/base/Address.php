<?php

namespace app\modules\sakila\models\base;

use Yii;

/**
 * This is the base-model class for table "address".
 *
 * @property integer $address_id
 * @property string $address
 * @property string $address2
 * @property string $district
 * @property integer $city_id
 * @property string $postal_code
 * @property string $phone
 * @property string $last_update
 *
 * @property \app\modules\sakila\models\City $city
 * @property \app\modules\sakila\models\Customer[] $customers
 * @property \app\modules\sakila\models\Staff[] $staff
 * @property \app\modules\sakila\models\Store[] $stores
 */
class Address extends \app\modules\sakila\base\SakilaActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address', 'district', 'city_id', 'phone'], 'required'],
            [['city_id'], 'integer'],
            [['last_update'], 'safe'],
            [['address', 'address2'], 'string', 'max' => 50],
            [['district', 'phone'], 'string', 'max' => 20],
            [['postal_code'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'address_id' => Yii::t('app', 'Address ID'),
            'address' => Yii::t('app', 'Address'),
            'address2' => Yii::t('app', 'Address2'),
            'district' => Yii::t('app', 'District'),
            'city_id' => Yii::t('app', 'City ID'),
            'postal_code' => Yii::t('app', 'Postal Code'),
            'phone' => Yii::t('app', 'Phone'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(\app\modules\sakila\models\City::className(), ['city_id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(\app\modules\sakila\models\Customer::className(), ['address_id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(\app\modules\sakila\models\Staff::className(), ['address_id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStores()
    {
        return $this->hasMany(\app\modules\sakila\models\Store::className(), ['address_id' => 'address_id']);
    }
}

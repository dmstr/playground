<?php

namespace app\modules\sakila\models\base;

use Yii;

/**
 * This is the base-model class for table "customer".
 *
 * @property integer $customer_id
 * @property integer $store_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property integer $address_id
 * @property integer $active
 * @property string $create_date
 * @property string $last_update
 *
 * @property \app\modules\sakila\models\Address $address
 * @property \app\modules\sakila\models\Store $store
 * @property \app\modules\sakila\models\Payment[] $payments
 * @property \app\modules\sakila\models\Rental[] $rentals
 */
class Customer extends \app\modules\sakila\base\SakilaActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['store_id', 'first_name', 'last_name', 'address_id', 'create_date'], 'required'],
            [['store_id', 'address_id', 'active'], 'integer'],
            [['create_date', 'last_update'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 45],
            [['email'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => Yii::t('app', 'Customer ID'),
            'store_id' => Yii::t('app', 'Store ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'email' => Yii::t('app', 'Email'),
            'address_id' => Yii::t('app', 'Address ID'),
            'active' => Yii::t('app', 'Active'),
            'create_date' => Yii::t('app', 'Create Date'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(\app\modules\sakila\models\Address::className(), ['address_id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(\app\modules\sakila\models\Store::className(), ['store_id' => 'store_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(\app\modules\sakila\models\Payment::className(), ['customer_id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRentals()
    {
        return $this->hasMany(\app\modules\sakila\models\Rental::className(), ['customer_id' => 'customer_id']);
    }
}

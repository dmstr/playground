<?php

namespace app\modules\sakila\models\base;

use Yii;

/**
 * This is the base-model class for table "staff".
 *
 * @property integer $staff_id
 * @property string $first_name
 * @property string $last_name
 * @property integer $address_id
 * @property string $picture
 * @property string $email
 * @property integer $store_id
 * @property integer $active
 * @property string $username
 * @property string $password
 * @property string $last_update
 *
 * @property \app\modules\sakila\models\Payment[] $payments
 * @property \app\modules\sakila\models\Rental[] $rentals
 * @property \app\modules\sakila\models\Address $address
 * @property \app\modules\sakila\models\Store $store
 * @property \app\modules\sakila\models\Store[] $stores
 */
class Staff extends \app\modules\sakila\base\SakilaActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'address_id', 'store_id', 'username'], 'required'],
            [['address_id', 'store_id', 'active'], 'integer'],
            [['picture'], 'string'],
            [['last_update'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 45],
            [['email'], 'string', 'max' => 50],
            [['username'], 'string', 'max' => 16],
            [['password'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'staff_id' => Yii::t('app', 'Staff ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'address_id' => Yii::t('app', 'Address ID'),
            'picture' => Yii::t('app', 'Picture'),
            'email' => Yii::t('app', 'Email'),
            'store_id' => Yii::t('app', 'Store ID'),
            'active' => Yii::t('app', 'Active'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(\app\modules\sakila\models\Payment::className(), ['staff_id' => 'staff_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRentals()
    {
        return $this->hasMany(\app\modules\sakila\models\Rental::className(), ['staff_id' => 'staff_id']);
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
    public function getStores()
    {
        return $this->hasMany(\app\modules\sakila\models\Store::className(), ['manager_staff_id' => 'staff_id']);
    }
}

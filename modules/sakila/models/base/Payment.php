<?php

namespace app\modules\sakila\models\base;

use Yii;

/**
 * This is the base-model class for table "payment".
 *
 * @property integer $payment_id
 * @property integer $customer_id
 * @property integer $staff_id
 * @property integer $rental_id
 * @property string $amount
 * @property string $payment_date
 * @property string $last_update
 *
 * @property \app\modules\sakila\models\Customer $customer
 * @property \app\modules\sakila\models\Rental $rental
 * @property \app\modules\sakila\models\Staff $staff
 */
class Payment extends \app\modules\sakila\base\SakilaActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'staff_id', 'amount', 'payment_date'], 'required'],
            [['customer_id', 'staff_id', 'rental_id'], 'integer'],
            [['amount'], 'number'],
            [['payment_date', 'last_update'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'payment_id' => Yii::t('app', 'Payment ID'),
            'customer_id' => Yii::t('app', 'Customer ID'),
            'staff_id' => Yii::t('app', 'Staff ID'),
            'rental_id' => Yii::t('app', 'Rental ID'),
            'amount' => Yii::t('app', 'Amount'),
            'payment_date' => Yii::t('app', 'Payment Date'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(\app\modules\sakila\models\Customer::className(), ['customer_id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRental()
    {
        return $this->hasOne(\app\modules\sakila\models\Rental::className(), ['rental_id' => 'rental_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasOne(\app\modules\sakila\models\Staff::className(), ['staff_id' => 'staff_id']);
    }
}

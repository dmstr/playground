<?php

namespace app\modules\sakila\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sakila\models\Payment;

/**
 * PaymentSearch represents the model behind the search form about Payment.
 */
class PaymentSearch extends Model
{
	public $payment_id;
	public $customer_id;
	public $staff_id;
	public $rental_id;
	public $amount;
	public $payment_date;
	public $last_update;

	public function rules()
	{
		return [
			[['payment_id', 'customer_id', 'staff_id', 'rental_id'], 'integer'],
			[['amount'], 'number'],
			[['payment_date', 'last_update'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'payment_id' => 'Payment ID',
			'customer_id' => 'Customer ID',
			'staff_id' => 'Staff ID',
			'rental_id' => 'Rental ID',
			'amount' => 'Amount',
			'payment_date' => 'Payment Date',
			'last_update' => 'Last Update',
		];
	}

	public function search($params)
	{
		$query = Payment::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'payment_id' => $this->payment_id,
            'customer_id' => $this->customer_id,
            'staff_id' => $this->staff_id,
            'rental_id' => $this->rental_id,
            'amount' => $this->amount,
            'payment_date' => $this->payment_date,
            'last_update' => $this->last_update,
        ]);

		return $dataProvider;
	}

	protected function addCondition($query, $attribute, $partialMatch = false)
	{
		$value = $this->$attribute;
		if (trim($value) === '') {
			return;
		}
		if ($partialMatch) {
			$value = '%' . strtr($value, ['%'=>'\%', '_'=>'\_', '\\'=>'\\\\']) . '%';
			$query->andWhere(['like', $attribute, $value]);
		} else {
			$query->andWhere([$attribute => $value]);
		}
	}
}

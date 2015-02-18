<?php

namespace app\modules\sakila\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sakila\models\Customer;

/**
 * CustomerSearch represents the model behind the search form about Customer.
 */
class CustomerSearch extends Model
{
	public $customer_id;
	public $store_id;
	public $first_name;
	public $last_name;
	public $email;
	public $address_id;
	public $active;
	public $create_date;
	public $last_update;

	public function rules()
	{
		return [
			[['customer_id', 'store_id', 'address_id', 'active'], 'integer'],
			[['first_name', 'last_name', 'email', 'create_date', 'last_update'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'customer_id' => 'Customer ID',
			'store_id' => 'Store ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'address_id' => 'Address ID',
			'active' => 'Active',
			'create_date' => 'Create Date',
			'last_update' => 'Last Update',
		];
	}

	public function search($params)
	{
		$query = Customer::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'customer_id' => $this->customer_id,
            'store_id' => $this->store_id,
            'address_id' => $this->address_id,
            'active' => $this->active,
            'create_date' => $this->create_date,
            'last_update' => $this->last_update,
        ]);

		$query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email', $this->email]);

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

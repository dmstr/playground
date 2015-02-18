<?php

namespace app\modules\sakila\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sakila\models\Store;

/**
 * StoreSearch represents the model behind the search form about Store.
 */
class StoreSearch extends Model
{
	public $store_id;
	public $manager_staff_id;
	public $address_id;
	public $last_update;

	public function rules()
	{
		return [
			[['store_id', 'manager_staff_id', 'address_id'], 'integer'],
			[['last_update'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'store_id' => 'Store ID',
			'manager_staff_id' => 'Manager Staff ID',
			'address_id' => 'Address ID',
			'last_update' => 'Last Update',
		];
	}

	public function search($params)
	{
		$query = Store::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'store_id' => $this->store_id,
            'manager_staff_id' => $this->manager_staff_id,
            'address_id' => $this->address_id,
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

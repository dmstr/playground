<?php

namespace app\modules\sakila\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sakila\models\City;

/**
 * CitySearch represents the model behind the search form about City.
 */
class CitySearch extends Model
{
	public $city_id;
	public $city;
	public $country_id;
	public $last_update;

	public function rules()
	{
		return [
			[['city_id', 'country_id'], 'integer'],
			[['city', 'last_update'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'city_id' => 'City ID',
			'city' => 'City',
			'country_id' => 'Country ID',
			'last_update' => 'Last Update',
		];
	}

	public function search($params)
	{
		$query = City::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'city_id' => $this->city_id,
            'country_id' => $this->country_id,
            'last_update' => $this->last_update,
        ]);

		$query->andFilterWhere(['like', 'city', $this->city]);

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

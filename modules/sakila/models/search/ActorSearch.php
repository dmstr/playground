<?php

namespace app\modules\sakila\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sakila\models\Actor;

/**
 * ActorSearch represents the model behind the search form about Actor.
 */
class ActorSearch extends Model
{
	public $actor_id;
	public $first_name;
	public $last_name;
	public $last_update;

	public function rules()
	{
		return [
			[['actor_id'], 'integer'],
			[['first_name', 'last_name', 'last_update'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'actor_id' => 'Actor ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'last_update' => 'Last Update',
		];
	}

	public function search($params)
	{
		$query = Actor::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'actor_id' => $this->actor_id,
            'last_update' => $this->last_update,
        ]);

		$query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name]);

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

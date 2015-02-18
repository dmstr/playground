<?php

namespace app\modules\sakila\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sakila\models\FilmActor;

/**
 * FilmActorSearch represents the model behind the search form about FilmActor.
 */
class FilmActorSearch extends Model
{
	public $actor_id;
	public $film_id;
	public $last_update;

	public function rules()
	{
		return [
			[['actor_id', 'film_id'], 'integer'],
			[['last_update'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'actor_id' => 'Actor ID',
			'film_id' => 'Film ID',
			'last_update' => 'Last Update',
		];
	}

	public function search($params)
	{
		$query = FilmActor::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'actor_id' => $this->actor_id,
            'film_id' => $this->film_id,
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

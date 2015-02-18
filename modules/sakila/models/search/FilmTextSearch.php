<?php

namespace app\modules\sakila\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sakila\models\FilmText;

/**
 * FilmTextSearch represents the model behind the search form about FilmText.
 */
class FilmTextSearch extends Model
{
	public $film_id;
	public $title;
	public $description;

	public function rules()
	{
		return [
			[['film_id'], 'integer'],
			[['title', 'description'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'film_id' => 'Film ID',
			'title' => 'Title',
			'description' => 'Description',
		];
	}

	public function search($params)
	{
		$query = FilmText::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'film_id' => $this->film_id,
        ]);

		$query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description]);

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

<?php

namespace app\modules\sakila\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sakila\models\FilmCategory;

/**
 * FilmCategorySearch represents the model behind the search form about FilmCategory.
 */
class FilmCategorySearch extends Model
{
	public $film_id;
	public $category_id;
	public $last_update;

	public function rules()
	{
		return [
			[['film_id', 'category_id'], 'integer'],
			[['last_update'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'film_id' => 'Film ID',
			'category_id' => 'Category ID',
			'last_update' => 'Last Update',
		];
	}

	public function search($params)
	{
		$query = FilmCategory::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'film_id' => $this->film_id,
            'category_id' => $this->category_id,
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

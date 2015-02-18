<?php

namespace app\modules\sakila\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sakila\models\Film as FilmModel;

/**
* Film represents the model behind the search form about `app\modules\sakila\models\Film`.
*/
class Film extends FilmModel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['film_id', 'language_id', 'original_language_id', 'rental_duration', 'length'], 'integer'],
            [['title', 'description', 'release_year', 'rating', 'special_features', 'last_update'], 'safe'],
            [['rental_rate', 'replacement_cost'], 'number'],
];
}

/**
* @inheritdoc
*/
public function scenarios()
{
// bypass scenarios() implementation in the parent class
return Model::scenarios();
}

/**
* Creates data provider instance with search query applied
*
* @param array $params
*
* @return ActiveDataProvider
*/
public function search($params)
{
$query = FilmModel::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere([
            'film_id' => $this->film_id,
            'release_year' => $this->release_year,
            'language_id' => $this->language_id,
            'original_language_id' => $this->original_language_id,
            'rental_duration' => $this->rental_duration,
            'rental_rate' => $this->rental_rate,
            'length' => $this->length,
            'replacement_cost' => $this->replacement_cost,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'rating', $this->rating])
            ->andFilterWhere(['like', 'special_features', $this->special_features]);

return $dataProvider;
}
}
<?php

namespace app\modules\sakila\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sakila\models\FilmCategory as FilmCategoryModel;

/**
* FilmCategory represents the model behind the search form about `app\modules\sakila\models\FilmCategory`.
*/
class FilmCategory extends FilmCategoryModel
{
/**
* @inheritdoc
*/
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
$query = FilmCategoryModel::find();

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
            'category_id' => $this->category_id,
            'last_update' => $this->last_update,
        ]);

return $dataProvider;
}
}
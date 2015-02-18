<?php

namespace app\modules\sakila\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sakila\models\FilmActor as FilmActorModel;

/**
* FilmActor represents the model behind the search form about `app\modules\sakila\models\FilmActor`.
*/
class FilmActor extends FilmActorModel
{
/**
* @inheritdoc
*/
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
$query = FilmActorModel::find();

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
            'actor_id' => $this->actor_id,
            'film_id' => $this->film_id,
            'last_update' => $this->last_update,
        ]);

return $dataProvider;
}
}
<?php

namespace app\modules\sakila\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sakila\models\City as CityModel;

/**
* City represents the model behind the search form about `app\modules\sakila\models\City`.
*/
class City extends CityModel
{
/**
* @inheritdoc
*/
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
$query = CityModel::find();

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
            'city_id' => $this->city_id,
            'country_id' => $this->country_id,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'city', $this->city]);

return $dataProvider;
}
}
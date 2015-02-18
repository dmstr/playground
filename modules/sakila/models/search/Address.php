<?php

namespace app\modules\sakila\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sakila\models\Address as AddressModel;

/**
* Address represents the model behind the search form about `app\modules\sakila\models\Address`.
*/
class Address extends AddressModel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['address_id', 'city_id'], 'integer'],
            [['address', 'address2', 'district', 'postal_code', 'phone', 'last_update'], 'safe'],
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
$query = AddressModel::find();

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
            'address_id' => $this->address_id,
            'city_id' => $this->city_id,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'address2', $this->address2])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'postal_code', $this->postal_code])
            ->andFilterWhere(['like', 'phone', $this->phone]);

return $dataProvider;
}
}
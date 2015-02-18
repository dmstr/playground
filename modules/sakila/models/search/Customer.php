<?php

namespace app\modules\sakila\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sakila\models\Customer as CustomerModel;

/**
* Customer represents the model behind the search form about `app\modules\sakila\models\Customer`.
*/
class Customer extends CustomerModel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['customer_id', 'store_id', 'address_id', 'active'], 'integer'],
            [['first_name', 'last_name', 'email', 'create_date', 'last_update'], 'safe'],
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
$query = CustomerModel::find();

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
            'customer_id' => $this->customer_id,
            'store_id' => $this->store_id,
            'address_id' => $this->address_id,
            'active' => $this->active,
            'create_date' => $this->create_date,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email', $this->email]);

return $dataProvider;
}
}
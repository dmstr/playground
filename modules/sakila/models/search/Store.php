<?php

namespace app\modules\sakila\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sakila\models\Store as StoreModel;

/**
* Store represents the model behind the search form about `app\modules\sakila\models\Store`.
*/
class Store extends StoreModel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['store_id', 'manager_staff_id', 'address_id'], 'integer'],
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
$query = StoreModel::find();

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
            'store_id' => $this->store_id,
            'manager_staff_id' => $this->manager_staff_id,
            'address_id' => $this->address_id,
            'last_update' => $this->last_update,
        ]);

return $dataProvider;
}
}
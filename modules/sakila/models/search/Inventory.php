<?php

namespace app\modules\sakila\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sakila\models\Inventory as InventoryModel;

/**
* Inventory represents the model behind the search form about `app\modules\sakila\models\Inventory`.
*/
class Inventory extends InventoryModel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['inventory_id', 'film_id', 'store_id'], 'integer'],
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
$query = InventoryModel::find();

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
            'inventory_id' => $this->inventory_id,
            'film_id' => $this->film_id,
            'store_id' => $this->store_id,
            'last_update' => $this->last_update,
        ]);

return $dataProvider;
}
}
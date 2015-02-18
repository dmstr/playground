<?php

namespace app\modules\sakila\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sakila\models\Rental as RentalModel;

/**
* Rental represents the model behind the search form about `app\modules\sakila\models\Rental`.
*/
class Rental extends RentalModel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['rental_id', 'inventory_id', 'customer_id', 'staff_id'], 'integer'],
            [['rental_date', 'return_date', 'last_update'], 'safe'],
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
$query = RentalModel::find();

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
            'rental_id' => $this->rental_id,
            'rental_date' => $this->rental_date,
            'inventory_id' => $this->inventory_id,
            'customer_id' => $this->customer_id,
            'return_date' => $this->return_date,
            'staff_id' => $this->staff_id,
            'last_update' => $this->last_update,
        ]);

return $dataProvider;
}
}
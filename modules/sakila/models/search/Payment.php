<?php

namespace app\modules\sakila\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sakila\models\Payment as PaymentModel;

/**
* Payment represents the model behind the search form about `app\modules\sakila\models\Payment`.
*/
class Payment extends PaymentModel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['payment_id', 'customer_id', 'staff_id', 'rental_id'], 'integer'],
            [['amount'], 'number'],
            [['payment_date', 'last_update'], 'safe'],
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
$query = PaymentModel::find();

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
            'payment_id' => $this->payment_id,
            'customer_id' => $this->customer_id,
            'staff_id' => $this->staff_id,
            'rental_id' => $this->rental_id,
            'amount' => $this->amount,
            'payment_date' => $this->payment_date,
            'last_update' => $this->last_update,
        ]);

return $dataProvider;
}
}
<?php

namespace app\modules\sakila\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sakila\models\Staff as StaffModel;

/**
* Staff represents the model behind the search form about `app\modules\sakila\models\Staff`.
*/
class Staff extends StaffModel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['staff_id', 'address_id', 'store_id', 'active'], 'integer'],
            [['first_name', 'last_name', 'picture', 'email', 'username', 'password', 'last_update'], 'safe'],
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
$query = StaffModel::find();

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
            'staff_id' => $this->staff_id,
            'address_id' => $this->address_id,
            'store_id' => $this->store_id,
            'active' => $this->active,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password]);

return $dataProvider;
}
}
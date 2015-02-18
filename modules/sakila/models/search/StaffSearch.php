<?php

namespace app\modules\sakila\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sakila\models\Staff;

/**
 * StaffSearch represents the model behind the search form about Staff.
 */
class StaffSearch extends Model
{
	public $staff_id;
	public $first_name;
	public $last_name;
	public $address_id;
	public $picture;
	public $email;
	public $store_id;
	public $active;
	public $username;
	public $password;
	public $last_update;

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
	public function attributeLabels()
	{
		return [
			'staff_id' => 'Staff ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'address_id' => 'Address ID',
			'picture' => 'Picture',
			'email' => 'Email',
			'store_id' => 'Store ID',
			'active' => 'Active',
			'username' => 'Username',
			'password' => 'Password',
			'last_update' => 'Last Update',
		];
	}

	public function search($params)
	{
		$query = Staff::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
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

	protected function addCondition($query, $attribute, $partialMatch = false)
	{
		$value = $this->$attribute;
		if (trim($value) === '') {
			return;
		}
		if ($partialMatch) {
			$value = '%' . strtr($value, ['%'=>'\%', '_'=>'\_', '\\'=>'\\\\']) . '%';
			$query->andWhere(['like', $attribute, $value]);
		} else {
			$query->andWhere([$attribute => $value]);
		}
	}
}

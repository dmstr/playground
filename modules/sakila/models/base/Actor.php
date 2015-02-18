<?php

namespace app\modules\sakila\models\base;

use Yii;

/**
 * This is the base-model class for table "actor".
 *
 * @property integer $actor_id
 * @property string $first_name
 * @property string $last_name
 * @property string $last_update
 *
 * @property \app\modules\sakila\models\FilmActor[] $filmActors
 * @property \app\modules\sakila\models\Film[] $films
 */
class Actor extends \app\modules\sakila\base\SakilaActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'actor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name'], 'required'],
            [['last_update'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'actor_id' => Yii::t('app', 'Actor ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmActors()
    {
        return $this->hasMany(\app\modules\sakila\models\FilmActor::className(), ['actor_id' => 'actor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilms()
    {
        return $this->hasMany(\app\modules\sakila\models\Film::className(), ['film_id' => 'film_id'])->viaTable('film_actor', ['actor_id' => 'actor_id']);
    }
}

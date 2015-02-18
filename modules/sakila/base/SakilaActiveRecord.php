<?php

namespace app\modules\sakila\base;

use yii\db\ActiveRecord;

class SakilaActiveRecord extends ActiveRecord
{
    public static function getDb()
    {
        return \Yii::$app->db; // you may change the database connection here
    }
}
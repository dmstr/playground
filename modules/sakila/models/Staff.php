<?php

namespace app\modules\sakila\models;

use Yii;

/**
 * This is the model class for table "staff".
 */
class Staff extends \app\modules\sakila\models\base\Staff
{
    public function getLabel() {
        return $this->first_name.' '.$this->last_name;
    }
}

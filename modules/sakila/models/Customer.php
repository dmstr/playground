<?php

namespace app\modules\sakila\models;

use Yii;

/**
 * This is the model class for table "customer".
 */
class Customer extends \app\modules\sakila\models\base\Customer
{
    public function getLabel() {
        return $this->first_name.' '.$this->last_name;
    }

}

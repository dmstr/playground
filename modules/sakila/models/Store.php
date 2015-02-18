<?php

namespace app\modules\sakila\models;

use Yii;

/**
 * This is the model class for table "store".
 */
class Store extends \app\modules\sakila\models\base\Store
{
    public function getLabel() {
        return $this->address->address.', '.$this->address->district;
    }
}

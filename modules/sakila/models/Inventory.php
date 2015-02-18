<?php

namespace app\modules\sakila\models;

use Yii;

/**
 * This is the model class for table "inventory".
 */
class Inventory extends \app\modules\sakila\models\base\Inventory
{


    public function getLabel() {
        return $this->film->title.' ('.$this->store_id.')';
    }
}

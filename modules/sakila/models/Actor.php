<?php

namespace app\modules\sakila\models;

use Yii;

/**
 * This is the model class for table "actor".
 */
class Actor extends \app\modules\sakila\models\base\Actor
{

    public function getLabel() {
        return $this->first_name.' '.$this->last_name;
    }
}

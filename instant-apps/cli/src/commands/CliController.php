<?php

namespace app\commands;

use mikehaertl\shellcommand\Command;

/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2015 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class CliController extends \yii\console\Controller
{
    /**
     * Says hello world
     */
    public function actionIndex(){
        echo "Hello world.\n";
    }
}
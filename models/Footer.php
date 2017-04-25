<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26.03.2017
 * Time: 16:10
 */

namespace app\models;


use yii\db\ActiveRecord;

class Footer extends ActiveRecord
{
    public static function tableName()
    {
        return 'footer';
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.03.2017
 * Time: 18:34
 */

namespace app\models;


use yii\db\ActiveRecord;

class Logo extends ActiveRecord
{
    public static function tableName()
    {
        return 'logo';
    }
}
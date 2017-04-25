<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 01.04.2017
 * Time: 2:37
 */

namespace app\models;


use yii\db\ActiveRecord;

class Tag extends ActiveRecord
{
    public static function tableName()
    {
        return 'tags';
    }

}
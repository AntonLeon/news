<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20.03.2017
 * Time: 11:03
 */

namespace app\models;


use yii\db\ActiveRecord;

class Author extends ActiveRecord
{
    public static function tableName()
    {
       return 'authors';
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18.03.2017
 * Time: 22:01
 */

namespace app\models;


use yii\db\ActiveRecord;

class Slider extends ActiveRecord
{
    public static function tableName()
    {
        return 'slider';
    }

    public static function whereSlider($where = [])
    {
        return Slider::find()
            ->where($where)
            ->all();
    }
}
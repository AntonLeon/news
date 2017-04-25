<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22.03.2017
 * Time: 0:19
 */

namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'categories';
    }

    public static function allCategoties()
    {
        return Category::find()
            ->all();
    }

    public static function limitCategories($limit)
    {
        return Category::find()
            ->limit($limit)
            ->all();
    }

    public static function nineCategories()
    {
        return Category::find()
            ->limit(9)
            ->all();
    }
}
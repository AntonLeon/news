<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22.03.2017
 * Time: 11:30
 */

namespace app\models;


use yii\db\ActiveRecord;

class Banner extends ActiveRecord
{
    public static function tableName()
    {
        return 'banners';
    }

    public static function orderLimitBanner($order, $limit)
    {
        return Banner::find()
            ->orderBy($order)
            ->limit($limit)
            ->all();
    }
}
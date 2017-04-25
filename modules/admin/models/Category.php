<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property string $name
 */
class Category extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'category_name',
                // 'slugAttribute' => 'slug',
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name'], 'required'],
            [['category_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_name' => 'Category name',
        ];
    }
}

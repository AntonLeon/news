<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "footer".
 *
 * @property integer $id
 * @property string $footer_link
 */
class Footer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'footer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['footer_url', 'footer_title'], 'required'],
            [['footer_url', 'footer_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'footer_url' => 'Footer URL',
            'footer_title' => 'Footer title',
        ];
    }
}

<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property integer $id
 * @property string $img
 * @property string $title
 * @property string $text
 * @property integer $active
 */
class Slider extends \yii\db\ActiveRecord
{
    public $slider_file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slider_active', 'slider_title', 'slider_text', 'slider_url'], 'required'],
            [['slider_active'], 'integer'],
            [['slider_file'], 'file'],
            [['slider_text'], 'string'],
            [['slider_img', 'slider_title', 'slider_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slider_img' => 'Slider imag',
            'slider_title' => 'Slider title',
            'slider_text' => 'Slider text',
            'slider_url' => 'URL',
            'slider_active' => 'Active',
        ];
    }
}

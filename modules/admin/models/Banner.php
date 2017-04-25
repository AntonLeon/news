<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "banners".
 *
 * @property integer $id
 * @property string $banner_title
 */
class Banner extends \yii\db\ActiveRecord
{
    public $banner_file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banners';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['banner_title', 'banner_url'], 'required'],
            [['banner_file'], 'file'],
            [['banner_title', 'banner_img', 'banner_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'banner_title' => 'Banner Title',
            'banner_img' => 'Banner image',
            'banner_url' => 'URL'
        ];
    }
}

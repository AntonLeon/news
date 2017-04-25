<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "logo".
 *
 * @property integer $id
 * @property string $logo_img
 */
class Logo extends \yii\db\ActiveRecord
{
    public $logo_file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'logo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['logo_img', 'logo_file'], 'required'],
            [['logo_img'], 'string', 'max' => 255],
            [['logo_file'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'logo_img' => 'Logo Img',
        ];
    }
}

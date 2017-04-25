<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "tags".
 *
 * @property integer $id
 * @property string $tag
 */
class Tag extends \yii\db\ActiveRecord
{
    public $tag_items = [];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag'], 'required'],
            [['tag'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag' => 'Tag',
        ];
    }
}

<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "authors".
 *
 * @property integer $id
 * @property string $firstName
 * @property string $lastName
 * @property string $img
 */
class Author extends \yii\db\ActiveRecord
{

    public $author_file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_name', 'author_file'], 'required'],
            [['author_name', 'author_img'], 'string', 'max' => 255],
            [['author_file'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_name' => 'Author name',
            'author_img' => 'Author photo',
        ];
    }
}

<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property string $thumbnail_img
 * @property string $header_img
 * @property string $title
 * @property string $text
 * @property integer $category_id
 * @property string $date
 * @property integer $author_id
 * @property integer $tag_id
 * @property integer $actives
 */
class Post extends \yii\db\ActiveRecord
{
    public $post_image;

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                // 'slugAttribute' => 'slug',
            ],
        ];
    }

     /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'category_id', 'author_id', 'actives'], 'required'],
            [['text'], 'string'],
            [['post_image'], 'file'],
            [['category_id', 'author_id', 'tag_id', 'actives', 'post_featured'], 'integer'],
            [['thumbnail_img', 'header_img', 'title', 'date', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'thumbnail_img' => 'Thumbnail Img',
            'header_img' => 'Header Img',
            'title' => 'Title',
            'text' => 'Text',
            'category_id' => 'Category ID',
            'date' => 'Date',
            'author_id' => 'Author ID',
            'tag_id' => 'Tag ID',
            'post_featured' => 'Featured post',
            'actives' => 'Actives',
            'slug' => 'Slug',
        ];
    }
}

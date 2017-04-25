<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18.03.2017
 * Time: 22:08
 */

namespace app\models;


use yii\db\ActiveRecord;


class Post extends ActiveRecord
{
    public static function tableName()
    {
        return 'posts';
    }

    public function getAuthors()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }

    public function getTags()
    {
        return $this->hasOne(Tag::className(), ['id' => 'tag_id']);
    }

    public function getCategories()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public static function whereOrderLimitPost($where = [], $order = '', $limit)
    {
        return Post::find()
            ->where($where)
            ->orderBy($order)
            ->limit($limit)
            ->all();
    }

    public static function whereCountPosts($where = [])
    {
        return Post::find()
            ->where($where)
            ->count();
    }

    public static function whereOrderPost($where = [], $order)
    {
        return Post::find()
            ->where($where)
            ->orderBy($order)
            ->all();
    }

    public static function arrayWhereOrderCountPost($where = [], $order)
    {
        return Post::find()
            ->asArray()
            ->where($where)
            ->orderBy($order)
            ->count();
    }

    public static function whereOrderLimitOffsetPost($where = [], $order, $limit, $offset)
    {
        return Post::find()
            ->where($where)
            ->orderBy($order)
            ->limit($limit)
            ->offset($offset)
            ->all();
    }

    public static function whereOrderArrayPost($where = [], $order = '') {
        return Post::find()
            ->where($where)
            ->orderBy($order)
            ->asArray()
            ->all();
    }
}
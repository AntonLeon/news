<?php

use yii\db\Migration;

/**
 * Handles the creation of table `posts`.
 */
class m170425_110135_create_posts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('posts', [
            'id' => 'pk',
            'thumbnail_img' => 'string NOT NULL',
            'header_img' => 'string NOT NULL',
            'title' => 'string NOT NULL',
            'text' => 'text NOT NULL',
            'date' => 'string NOT NULL',
            'category_id' => 'integer NOT NULL',
            'author_id' => 'integer NOT NULL',
            'tag_id' => 'integer NOT NULL',
            'actives' => 'boolean NOT NULL',
            'post_featured' => 'boolean NOT NULL',
            'slug' => 'string NOT NULL',
        ]);
        $this->addForeignKey('post_ibfk_1', 'posts', 'author_id', 'authors', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('post_ibfk_2', 'posts', 'category_id', 'categories', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('post_ibfk_3', 'posts', 'tag_id', 'tags', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('posts');
    }
}

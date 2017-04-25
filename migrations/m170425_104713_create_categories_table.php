<?php

use yii\db\Migration;

/**
 * Handles the creation of table `categories`.
 */
class m170425_104713_create_categories_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('categories', [
            'id' => 'pk',
            'category_name' => 'string NOT NULL',
            'slug' => 'string NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('categories');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `authors`.
 */
class m170425_103359_create_authors_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('authors', [
            'id' => 'pk',
            'author_name' => 'string NOT NULL',
            'author_img' => 'string NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('authors');
    }
}

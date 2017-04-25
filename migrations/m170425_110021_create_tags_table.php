<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tags`.
 */
class m170425_110021_create_tags_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tags', [
            'id' => 'pk',
            'tag' => 'string NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tags');
    }
}

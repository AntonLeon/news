<?php

use yii\db\Migration;

class m170428_081429_rename_posts_column_id extends Migration
{
    public function up()
    {
        $this->renameColumn('posts', 'id', 'post_id');
    }

    public function down()
    {
        $this->renameColumn('posts', 'post_id', 'id');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `home`.
 */
class m170425_105227_create_home_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('home', [
            'logo' => 'string',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('home');
    }
}

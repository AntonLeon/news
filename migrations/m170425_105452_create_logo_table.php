<?php

use yii\db\Migration;

/**
 * Handles the creation of table `logo`.
 */
class m170425_105452_create_logo_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('logo', [
            'id' => 'pk',
            'logo_img' => 'string NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('logo');
    }
}

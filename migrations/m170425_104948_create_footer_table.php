<?php

use yii\db\Migration;

/**
 * Handles the creation of table `footer`.
 */
class m170425_104948_create_footer_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('footer', [
            'id' => 'pk',
            'footer_link' => 'string NOT NULL',
            'footer_title' => 'string NOT NULL',
            'footer_url' => 'string NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('footer');
    }
}

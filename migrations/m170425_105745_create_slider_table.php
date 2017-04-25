<?php

use yii\db\Migration;

/**
 * Handles the creation of table `slider`.
 */
class m170425_105745_create_slider_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('slider', [
            'id' => 'pk',
            'slider_img' => 'string NOT NULL',
            'slider_title' => 'string NOT NULL',
            'slider_text' => 'string NOT NULL',
            'slider_url' => 'string',
            'slider_active' => 'boolean',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('slider');
    }
}

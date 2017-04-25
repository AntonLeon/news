<?php

use yii\db\Migration;

/**
 * Handles the creation of table `banners`.
 */
class m170425_104346_create_banners_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('banners', [
            'id' => 'pk',
            'banner_title' => 'string NOT NULL',
            'banner_img' => 'string NOT NULL',
            'banner_url' => 'string NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('banners');
    }
}

<?php

use yii\db\Migration;

/**
 * Class m220320_172307_renameTables
 */
class m220320_172308_renameTables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameTable('descriptions', 'labels');
        $this->renameTable('products_descriptions', 'products_labels');
        $this->renameColumn('products_labels', 'description_id', 'label_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameTable('labels', 'descriptions');
        $this->renameColumn('products_labels', 'label_id', 'description_id');
        $this->renameTable('products_labels', 'products_descriptions');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220320_172307_renameTables cannot be reverted.\n";

        return false;
    }
    */
}

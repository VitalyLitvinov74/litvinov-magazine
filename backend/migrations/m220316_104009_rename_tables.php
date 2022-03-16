<?php

use yii\db\Migration;

/**
 * Class m220316_104009_rename_tables
 */
class m220316_104009_rename_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameTable('attributes_collection', 'product_feature_set');
        $this->renameTable('product_attribute_values', 'product_characteristic_values');
        $this->renameTable('product_characteristics', 'product_info');
        $this->renameTable('product_attributes', 'product_characteristics');
        $this->renameTable('attributes_values_attributes_collections', 'product_feature_set_characteristic_value');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameTable('product_feature_set','attributes_collection');
        $this->renameTable('product_characteristic_values', 'product_attribute_values');
        $this->renameTable('product_characteristics', 'product_attributes');
        $this->renameTable('product_info','product_characteristics');
        $this->renameTable(
            'product_feature_set_characteristic_value',
            'attributes_values_attributes_collections'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220316_104009_rename_tables cannot be reverted.\n";

        return false;
    }
    */
}

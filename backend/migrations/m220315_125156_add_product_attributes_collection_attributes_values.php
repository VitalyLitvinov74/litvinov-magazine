<?php

use yii\db\Migration;

/**
 * Class m220315_125156_add_product_attributes_collection_attributes_values
 */
class m220315_125156_add_product_attributes_collection_attributes_values extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('attributes_values_attributes_collections', [
            'collection_id' => $this->integer()
                ->notNull()
                ->comment('id коллекции атрибутов из таблицы attributes_collection')
            ,
            'attribute_value_id' => $this->integer()
                ->notNull()
                ->comment('id значения атрибута из таблицы product_attribute_values')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('attributes_values_attributes_collections');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220315_125156_add_product_attributes_collection_attributes_values cannot be reverted.\n";

        return false;
    }
    */
}

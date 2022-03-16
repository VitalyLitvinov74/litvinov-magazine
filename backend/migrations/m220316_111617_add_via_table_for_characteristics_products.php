<?php

use yii\db\Migration;

/**
 * Class m220316_111617_add_via_table_for_characteristics_products
 */
class m220316_111617_add_via_table_for_characteristics_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            "product_characteristic_values",
            'characteristic_id',
            $this->integer()
                ->notNull()
                ->comment('id характеристики из таблицы product_characteristics')
        );
        $this->addColumn(
            'product_feature_set_characteristic_value',
            'id',
            $this->primaryKey()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product_characteristic_values', 'characteristic_id');
        $this->dropColumn('product_feature_set_characteristic_value', 'id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220316_111617_add_via_table_for_characteristics_products cannot be reverted.\n";

        return false;
    }
    */
}

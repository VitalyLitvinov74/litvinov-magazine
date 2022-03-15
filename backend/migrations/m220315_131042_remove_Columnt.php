<?php

use yii\db\Migration;

/**
 * Class m220315_131042_remove_Columnt
 */
class m220315_131042_remove_Columnt extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('product_attribute_values', 'price');
        $this->dropColumn('product_attribute_values', 'count');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn(
            'product_attribute_values',
            'price',
            $this->integer()
                ->defaultValue(0)
                ->notNull()
                ->comment('Стоимость продукта с текущим аттрибутом')
        );
        $this->addColumn(
            'product_attribute_values',
            'count',
            $this->integer()
                ->defaultValue(0)
                ->comment('кол-во товара которое осталось на складе, с текущим атрибутом')
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220315_131042_remove_Columnt cannot be reverted.\n";

        return false;
    }
    */
}

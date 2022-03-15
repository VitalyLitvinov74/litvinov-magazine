<?php

use yii\db\Migration;

/**
 * Class m220315_120129_add_product_attribute_values
 */
class m220315_120129_add_product_attribute_values extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_attribute_values', [
            'id' => $this->primaryKey(),
            'value' => $this->string()->notNull(),
            'product_id' => $this->integer()->notNull()->comment('id продукта к которому пренадлежит аттрибут'),
            'price' => $this->integer()
                ->defaultValue(0)
                ->notNull()
                ->comment('Стоимость продукта с текущим аттрибутом'),
            'count' => $this->integer()
                ->defaultValue(0)
                ->comment('кол-во товара которое осталось на складе, с текущим атрибутом')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product_attribute_values');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220315_120129_add_product_attribute_values cannot be reverted.\n";

        return false;
    }
    */
}

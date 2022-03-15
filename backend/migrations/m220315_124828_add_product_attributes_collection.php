<?php

use yii\db\Migration;

/**
 * Class m220315_124828_add_product_attributes_collection
 */
class m220315_124828_add_product_attributes_collection extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('attributes_collection', [
            'id'=>$this->primaryKey(),
            'product_id' => $this
                ->integer()
                ->notNull()
                ->comment('id продукта из таблицы products'),
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
        $this->dropTable('product_attributes_collection');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220315_124828_add_product_attributes_collection cannot be reverted.\n";

        return false;
    }
    */
}

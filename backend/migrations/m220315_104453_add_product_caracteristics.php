<?php

use yii\db\Migration;

/**
 * Class m220315_104453_add_product_caracteristics
 */
class m220315_104453_add_product_caracteristics extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_characteristics', [
            'product_id'=>$this->integer()->comment('id продукта из таблицы products')->notNull(),
            'type'=>$this->text()->comment('Тип характеристики, например тип ткани, вес, размер')->notNull(),
            'description'=>$this->text()->comment('Значение характеристики, например 500гр, или 10 x 10 x 15 cm')->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product_characteristics');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220315_104453_add_product_caracteristics cannot be reverted.\n";

        return false;
    }
    */
}

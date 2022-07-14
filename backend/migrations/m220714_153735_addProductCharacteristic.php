<?php

use yii\db\Migration;

/**
 * Class m220714_153735_addProductCharacteristic
 */
class m220714_153735_addProductCharacteristic extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products_characteristics', [
            'id' => $this->integer(),
            'product_id' => $this->integer()->comment('id продукта которому пренадлежит характеристика'),
            'name' => $this->string()->comment('Наименование характеристики')->notNull(),
            'value' => $this->string()->comment('Значение характеристики')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('products_characteristics');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220714_153735_addProductCharacteristic cannot be reverted.\n";

        return false;
    }
    */
}
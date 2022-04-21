<?php

use yii\db\Migration;

/**
 * Class m220419_173911_recreateTables
 */
class m220419_173912_recreateTables extends Migration
{
    public function safeUp()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'count' => $this->integer()
                ->comment('Кол-во товара готового к продаже'),
            'price' => $this->integer()
                ->comment('Стоимость продукта умноженная на 100')
        ]);
        $this->createTable('products_via_cards', [
            'product_id' => $this->integer()->comment('id из таблицы products'),
            'card_id' => $this->integer()->comment("id из таблицы product_cards")
        ]);
        $this->alterColumn('product_images', 'product_id',
            $this->integer()->comment('id из таблицы products')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('products');
        $this->dropTable('products_via_cards');
        $this->alterColumn('product_images', 'product_id',
            $this->integer()->comment('это id из таблицы product_cards')
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220419_173911_recreateTables cannot be reverted.\n";

        return false;
    }
    */
}

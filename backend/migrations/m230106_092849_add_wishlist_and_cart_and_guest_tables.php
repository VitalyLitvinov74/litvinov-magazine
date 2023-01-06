<?php

use yii\db\Migration;

/**
 * Class m230106_092849_add_wishlist_and_cart_and_guest_tables
 */
class m230106_092849_add_wishlist_and_cart_and_guest_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('customers', [
            'id' => $this->primaryKey()->comment('Покупателем может быть как Гость, так и зарегистрированный пользователь'),
            'token' => $this->string()->comment('Как только пользователь заходит на сайт он становится покупателем, ему присваивается уникальный токен.'),
        ]);

        $this->createTable('wishlist', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer()
        ]);

        $this->createTable('carts', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer(),
        ]);

        $this->createTable('carts_via_equipment', [
            'id' => $this->primaryKey(),
            'cart_id' => $this->integer(),
            'equipment_id' => $this->integer()
        ]);

        $this->createTable('wishlist_via_equipment', [
            'id' => $this->primaryKey(),
            'wishlist_id' => $this->integer(),
            'equipment_id' => $this->integer()
        ]);

        $this->addColumn(
            'users',
            'customer_id',
            $this->integer()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('users', 'customer_id');
        $this->dropTable('wishlist_via_equipment');
        $this->dropTable('carts_via_equipment');
        $this->dropTable('carts');
        $this->dropTable('wishlist');
        $this->dropTable('customers');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230106_092849_add_wishlist_and_cart_and_guest_tables cannot be reverted.\n";

        return false;
    }
    */
}

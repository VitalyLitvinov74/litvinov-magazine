<?php

use yii\db\Migration;

/**
 * Class m221223_193618_addcard_characteristicTable
 */
class m221223_193618_addcard_characteristicTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_cards_characteristics', [
            'id' => $this->primaryKey(),
            'characteristic_id' => $this->integer(),
            'card_id' => $this->integer()
        ]);
        $this->dropColumn('products_characteristics', 'value');
        $this->dropColumn('products_characteristics', 'name');
        $this->addColumn('products_characteristics', 'characteristic_id', $this->integer());
        $this->createTable('characteristics', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'value' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product_cards_characteristics');
        $this->dropColumn('products_characteristics', 'characteristic_id');
        $this->addColumn('products_characteristics', 'value', $this->string());
        $this->addColumn('products_characteristics', 'name', $this->string());
        $this->dropTable('characteristics');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221223_193618_addcard_characteristicTable cannot be reverted.\n";

        return false;
    }
    */
}

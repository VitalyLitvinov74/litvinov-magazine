<?php

use yii\db\Migration;

/**
 * Class m221224_081346_renameTables
 */
class m221224_081346_renameTables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameTable('product_cards', 'products');
        $this->renameTable('products_characteristics', 'equipment_via_characteristics');
        $this->renameTable('products_via_cards', 'product_via_equipments');
        $this->renameTable('product_images', 'equipment_images');
        $this->renameTable('product_cards_characteristics', 'product_via_characteristics');
        $this->addColumn('product_via_equipments', 'id', $this->primaryKey());
        $this->renameColumn('product_via_equipments','card_id', 'equipment_id');
        $this->renameColumn('product_via_characteristics', 'card_id', 'product_id');
        $this->renameColumn('equipment_via_characteristics', 'product_id', 'equipment_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('equipment_via_characteristics', 'equipment_id', 'product_id');
        $this->renameColumn('product_via_characteristics', 'product_id', 'card_id');
        $this->dropColumn('product_via_equipments', 'id');
        $this->renameColumn('product_via_equipments', 'equipment_id', 'card_id');
        $this->renameTable('product_via_characteristics', 'product_cards_characteristics');
        $this->renameTable('equipment_images', 'product_images');
        $this->renameTable('product_via_equipments', 'products_via_cards');
        $this->renameTable('equipment_via_characteristics', 'products_characteristics',);
        $this->renameTable('products', 'product_cards');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221224_081346_renameTables cannot be reverted.\n";

        return false;
    }
    */
}

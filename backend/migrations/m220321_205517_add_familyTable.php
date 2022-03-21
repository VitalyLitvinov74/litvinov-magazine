<?php

use yii\db\Migration;

/**
 * Class m220321_205517_add_familyTable
 */
class m220321_205517_add_familyTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('families', [
            'id' => $this->primaryKey()
        ]);
        $this->dropTable('products_labels');
        $this->createTable('families_products', [
            'family_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull()
        ]);
        $this->renameTable('family_images', 'families_images');
        $this->createTable('families_labels', [
            'family_id'=>$this->integer()->notNull(),
            'label_id'=>$this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('families');
        $this->createTable('products_labels', [
            'product_id' => $this->integer(),
            'description_id' => $this->integer()
        ]);
        $this->dropTable('families_products');
        $this->renameTable('families_images', 'family_images');
        $this->dropTable('families_labels');

    }


}

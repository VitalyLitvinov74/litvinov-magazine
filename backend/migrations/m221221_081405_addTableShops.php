<?php

use yii\db\Migration;

/**
 * Class m221221_081405_addTableShops
 */
class m221221_081405_addTableShops extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('shops', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->string()
        ]);
        $this->createTable('shop_template', [
            'id' => $this->primaryKey(),
            'shop_id' => $this->integer(),
            'template_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('shops');
        $this->dropTable('shop_template');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221221_081405_addTableShops cannot be reverted.\n";

        return false;
    }
    */
}

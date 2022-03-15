<?php

use yii\db\Migration;

/**
 * Class m220315_120121_add_product_attributes
 */
class m220315_120121_add_product_attributes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_attributes', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
                ->comment('имя аттрибута')
                ->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product_attributes');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220315_120121_add_product_attributes cannot be reverted.\n";

        return false;
    }
    */
}

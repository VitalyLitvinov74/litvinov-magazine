<?php

use yii\db\Migration;

/**
 * Class m230108_114549_addColumnAndRename
 */
class m230108_114549_addColumnAndRename extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('carts', 'token', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('carts', 'token');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230108_114549_addColumnAndRename cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Class m230109_171656_renameTable
 */
class m230109_171656_renameTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameTable('wishlist', 'wishlists');
        $this->addColumn('wishlists', 'token', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('wishlists', 'token');
        $this->renameTable('wishlists', 'wishlist');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230109_171656_renameTable cannot be reverted.\n";

        return false;
    }
    */
}

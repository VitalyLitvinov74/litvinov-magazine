<?php

use yii\db\Migration;

/**
 * Class m230115_140652_addBookingTable
 */
class m230115_140652_addBookingTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('booking', [
            'id' => $this->primaryKey(),
            'count' => $this->integer(),
            'equipment_id' => $this->integer(),
            'customer_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('booking');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230115_140652_addBookingTable cannot be reverted.\n";

        return false;
    }
    */
}

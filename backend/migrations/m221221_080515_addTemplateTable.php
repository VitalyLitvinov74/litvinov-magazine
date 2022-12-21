<?php

use yii\db\Migration;

/**
 * Class m221221_080515_addTemplateTable
 */
class m221221_080515_addTemplateTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('templates', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('templates');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221221_080515_addTemplateTable cannot be reverted.\n";

        return false;
    }
    */
}

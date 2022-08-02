<?php

use yii\db\Migration;

/**
 * Class m220802_151020_addPrimeryKeyToCharacteristicsTable
 */
class m220802_151020_addPrimeryKeyToCharacteristicsTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('products_characteristics', 'id', $this->primaryKey());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('products_characteristics', 'id', $this->integer());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220802_151020_addPrimeryKeyToCharacteristicsTable cannot be reverted.\n";

        return false;
    }
    */
}

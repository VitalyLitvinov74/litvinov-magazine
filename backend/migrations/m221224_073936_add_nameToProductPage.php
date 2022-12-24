<?php

use yii\db\Migration;

/**
 * Class m221224_073936_add_nameToProductPage
 */
class m221224_073936_add_nameToProductPage extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameTable('products', 'equipments');
        $this->addColumn(
            'equipments',
            'name',
            $this->string()->comment('Краткое название комплектации'
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('equipments', 'name');
        $this->renameTable('equipments', 'products');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221224_073936_add_nameToProductPage cannot be reverted.\n";

        return false;
    }
    */
}

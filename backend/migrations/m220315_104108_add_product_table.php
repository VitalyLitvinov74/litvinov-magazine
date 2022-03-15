<?php

use yii\db\Expression;
use yii\db\Migration;

/**
 * Class m220315_104108_add_product_table
 */
class m220315_104108_add_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'title' => $this->text()->comment("Наименование товара")->notNull(),
            'descriptions' => $this->text()->comment('Описание товара')->notNull(),
            'vendor_code'=>$this->string()->comment("Артикул товара"),
            'updated' => $this->timestamp()
                ->comment('Дата обновления')
                ->defaultValue(new Expression("NOW()"))
            ,
            'created' => $this->timestamp()
                ->comment('Дата создания')
                ->defaultValue(new Expression("NOW()"))
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('products');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220315_104108_add_product_table cannot be reverted.\n";

        return false;
    }
    */
}

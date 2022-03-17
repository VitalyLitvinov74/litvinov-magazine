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
            'short_desc'=>$this->string()->comment("Краткое описание товара")->notNull(),
            'descriptions' => $this->text()->comment('Описание товара')->notNull(),
            'default_price'=> $this->integer()->comment("Цена умноженная на 100, чтобы не было копеек"),
            'vendor_code'=>$this->string()->comment("Артикул товара"),
            'updated' => $this->timestamp()
                ->comment('Дата обновления')
                ->defaultValue(new Expression("NOW()"))
            ,
            'created' => $this->timestamp()
                ->comment('Дата создания')
                ->defaultValue(new Expression("NOW()"))
        ]);
        $this->createTable('product_info', [
            'id'=> $this->primaryKey(),
            'product_id'=> $this->integer()->notNull(),
            'type'=>$this->string()->comment('Тип (ключ), например Габариты')->notNull(),
            'value'=>$this->string()->comment("Значение характеристики, например 25х14х64")->notNull(),
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

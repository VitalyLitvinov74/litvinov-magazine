<?php

use yii\db\Migration;

/**
 * Class m220318_175734_add_tables
 */
class m220318_175734_add_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'price' => $this->integer()
                ->defaultValue(0)
                ->comment("Стоимость умноженная на 100, чтобы избавиться от дробной части"),
            'count' => $this->integer()
                ->defaultValue(0)
                ->comment("Кол-во товара на складе"),
            'vendor_code' => $this->string()
                ->comment("Артикул товара")
        ]);

        $this->createTable('descriptions', [
            'id' => $this->primaryKey(),
            'title' => $this->string()
                ->notNull()
                ->comment("Наименование товара"),
            'short_desc' => $this->text()
                ->notNull()
                ->comment("Краткое описание товара"),
            'desc' => $this->text()->comment('полное описание товара')
        ]);
        $this->createTable('products_descriptions',[
            'product_id'=> $this->integer(),
            'description_id'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('products');
        $this->dropTable('descriptions');
        $this->dropTable('products_description');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220318_175734_add_tables cannot be reverted.\n";

        return false;
    }
    */
}

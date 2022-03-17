<?php

use yii\db\Expression;
use yii\db\Migration;

/**
 * Class m220315_104119_add_product_images_table
 */
class m220315_104119_add_product_images_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_images', [
            'product_id'=>$this->double()->comment('id продукта из таблицы products')->notNull(),
            'url'=>$this->string()
                ->comment('относительный урл, изображения, без доменного имени')
                ->notNull(),
            'created'=>$this->timestamp()
                ->comment('Дата создания')
                ->defaultValue(new Expression("NOW()"))
            ,
            'updated'=>$this->timestamp()
                ->comment('Дата обновления')
                ->defaultValue(new Expression("NOW()"))
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product_images');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220315_104119_add_product_images_table cannot be reverted.\n";

        return false;
    }
    */
}

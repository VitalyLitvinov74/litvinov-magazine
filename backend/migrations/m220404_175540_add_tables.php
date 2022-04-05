<?php

use yii\db\Migration;

/**
 * Class m220404_175540_add_tables
 */
class m220404_175540_add_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_cards', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()
                ->comment('Наименование товара'),
            'description' => $this->text()
                ->comment('Полное описание товара'),
            'short_description' => $this->text()
                ->comment('Краткое описание товара'),
        ]);
        $this->createTable('product_images', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull()->comment('это id из таблицы product_cards'),
            'path' => $this->string()
                ->comment('Путь картинки, относительно корня домена api')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product_cards');
        $this->dropTable('product_images');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220404_175540_add_tables cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Class m220321_093729_add_image_table
 */
class m220321_093739_add_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('images', [
            'id' => $this->primaryKey(),
            'path' => $this->string()->comment('Относительный путь до изображения'),
        ]);
        $this->createTable('family_images', [
            'products_family_id' => $this->integer()->comment('это label_id из таблицы product_labels'),
            'image_id'=>$this->integer()->notNull()->comment('id из таблицы images')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('image');
        $this->dropTable('family_images');
    }
}

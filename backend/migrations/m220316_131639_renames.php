<?php

use yii\db\Expression;
use yii\db\Migration;

/**
 * Class m220316_131639_renames
 */
class m220316_131639_renames extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_models', [
            'id' => $this->primaryKey(),
            'title' => $this->string()
                ->notNull()
                ->comment('Заголовок семейства товара')
            ,
            'description' => $this->text()
                ->notNull()
                ->comment('Описание семейства товара')
            ,
            'short_description' => $this->text()
                ->notNull()
                ->comment('Краткое описание семейства товара')
            ,
            'created'=>$this->timestamp()
                ->defaultValue(new Expression("NOW()"))
                ->comment("дата добавления"),
            'updated'=>$this->timestamp()
                ->defaultValue(new Expression("NOW()"))
                ->comment("дата обновления")
        ]);
        $this->dropColumn('models', 'descriptions');
        $this->dropColumn('models', 'title');
        $this->renameTable('product_info', 'product_model_info');
        $this->renameColumn('product_model_info', 'product_id', 'product_models_id');
        $this->renameTable('product_images', 'product_model_images');
        $this->renameColumn('product_model_images', 'product_id', 'product_models_id');
        $this->addColumn(
            'models',
            'product_model_id',
            $this->integer()
            ->notNull()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product_models');
        $this->addColumn('models', 'title', $this->string()->notNull()->comment('Наименование товара'));
        $this->addColumn('models', 'descriptions', $this->string()->notNull()->comment("Описание товара"));
        $this->renameTable('product_model_info','product_info');
        $this->renameColumn('product_info', 'product_models_id', 'product_id');
        $this->renameTable('product_model_images', 'product_images');
        $this->renameColumn('product_images', 'product_models_id', 'product_id');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220316_131639_renames cannot be reverted.\n";

        return false;
    }
    */
}

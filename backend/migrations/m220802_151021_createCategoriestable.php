<?php

use app\tables\TableCategories;
use yii\db\Migration;

/**
 * Class m220802_151020_addPrimeryKeyToCharacteristicsTable
 */
class m220802_151021_createCategoriestable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);

        $this->createTable('categories_tree', [
            'parent_id' => $this->integer(),
            'child_id' => $this->integer(),
            'level' => $this->integer()
        ]);
        $this->addForeignKey(
            "child",
            'categories_tree',
            'child_id',
            'categories',
            'id',
            'CASCADE',
            'CASCADE'
            );
        $this->addForeignKey(
            "parent",
            'categories_tree',
            'parent_id',
            'categories',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $record = new TableCategories(['name'=>"Главная"]);
        $record->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('child', 'categories_tree');
        $this->dropForeignKey('parent', 'categories_tree');
        $this->dropTable('categories');
        $this->dropTable('categories_tree');
    }
}

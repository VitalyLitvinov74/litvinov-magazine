<?php

use app\tables\TableCategories;
use yii\db\Migration;

/**
 * Class m220802_151020_addPrimeryKeyToCharacteristicsTable
 */
class m220802_151022_createCategoriesTreetable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categories_tree', [
            'id'=> $this->primaryKey(),
            'parent_id' => $this->integer(),
            'child_id' => $this->integer(),
            'level' => $this->integer()
        ]);
        $this->createIndex(
            'unique_node',
            'categories_tree',
            [
                'parent_id',
                'child_id',
                'level'
            ],
            true
        );
//        $this->addForeignKey(
//            "child",
//            'categories_tree',
//            'child_id',
//            'categories',
//            'id',
//            'CASCADE',
//            'CASCADE'
//            );
//        $this->addForeignKey(
//            "parent",
//            'categories_tree',
//            'parent_id',
//            'categories',
//            'id',
//            'CASCADE',
//            'CASCADE'
//        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        $this->dropForeignKey('child', 'categories_tree');
//        $this->dropForeignKey('parent', 'categories_tree');
        $this->dropTable('categories_tree');
    }
}

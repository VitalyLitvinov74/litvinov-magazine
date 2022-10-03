<?php


namespace app\tables;

/**
 * Class TableCategoriesTree
 * @package app\tables
 * @property int $parent_id [int(11)]
 * @property int $child_id [int(11)]
 * @property int $level [int(11)] - уровень вложенности
 */
class TableCategoriesTree extends BaseTable
{
    public static function tableName()
    {
        return 'categories_tree';
    }
}
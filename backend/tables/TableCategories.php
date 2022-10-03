<?php


namespace app\tables;

/**
 * Class TableCategories
 * @package app\tables
 * @property int $id [int(11)]
 * @property string $name [varchar(255)]
 */
class TableCategories extends BaseTable
{
    public static function tableName()
    {
        return "categories";
    }
}
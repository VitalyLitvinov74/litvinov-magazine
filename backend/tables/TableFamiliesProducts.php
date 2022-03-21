<?php


namespace app\tables;


use yii\db\ActiveRecord;

class TableFamiliesProducts extends ActiveRecord
{
    public static function tableName()
    {
        return "families_products";
    }
}
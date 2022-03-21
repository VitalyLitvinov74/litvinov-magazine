<?php


namespace app\tables;


use yii\db\ActiveRecord;

class TableFamilyImages extends ActiveRecord
{
    public static function tableName()
    {
        return 'family_images';
    }
}
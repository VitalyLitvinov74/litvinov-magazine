<?php


namespace app\tables;


use yii\db\ActiveRecord;

/**
 * Class TableProductImages
 * @package app\tables
 * @property int $id [int(11)]
 * @property string $path [varchar(255)]  Путь картинки, относительно корня домена api
 * @property int $product_id [int(11)]  это id из таблицы product_cards
 */
class TableProductImages extends ActiveRecord
{
    public static function tableName()
    {
        return 'product_images';
    }

//    public function rules()
//    {
//        return ['id', 'exist', 'message'=>'Вы пытаетесь получить доступ к изображению которого нет'];
//    }
}
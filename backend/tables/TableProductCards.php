<?php


namespace app\tables;


use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Class TableProductCards
 * @package app\tables
 * @property int $id [int(11)]
 * @property string $title [varchar(255)]  Наименование товара
 * @property string $description Полное описание товара
 * @property string $short_description Краткое описание товара
 * @property TableProductImages[] $images
 */
class TableProductCards extends Table
{
    public static function tableName()
    {
        return 'product_cards';
    }

    /**
     * @return ActiveQuery|TableProductImages[]
     * @throws InvalidConfigException
     */
    public function getImages()
    {
        return $this
            ->hasMany(TableProductImages::class, ['id' => 'image_id'])
            ->viaTable('product_images', ['product_id' => 'id']);
    }
}
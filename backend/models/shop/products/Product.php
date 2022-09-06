<?php


namespace app\models\shop\products;


use app\models\contracts\IMedia;
use app\models\shop\products\contracts\IProduct;
use vloop\entities\contracts\IField;

class Product implements IProduct
{
    private $count;
    private $price;

    public function __construct(IField $price, IField $count)
    {
        $this->price = $price;
        $this->count = $count;
    }

    /**
     * @param IMedia $media - источник информации куда необходимо записать себя
     * @return IMedia - источник информации с только что записанными данными
     */
    public function printTo(IMedia $media): IMedia
    {
        return $media
            ->add('price', $this->price->value())
            ->add('count', $this->count->value());
    }

    /**
     * @param IField $newPrice
     * @return $this
     */
    public function changePrice(IField $newPrice): IProduct
    {
        $this->price = $newPrice;
        return $this;
    }

    /**
     * @param IField $newCount
     * @return $this - меняет кол-во товара на складе.
     */
    public function changeCount(IField $newCount): IProduct
    {
        $this->count = $newCount;
        return $this;
    }

    /**
     * Удаляет продукт из бд, вместе со всеми зависимыми частями.
     */
    public function moveToTrash(): void
    {
        $this->__destruct();
    }

    public function __destruct()
    {
        //nothing;
    }
}
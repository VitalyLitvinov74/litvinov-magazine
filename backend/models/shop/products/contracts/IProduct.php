<?php


namespace app\models\shop\products\contracts;


use app\models\contracts\IMedia;
use app\models\shop\products\characteristics\contract\ICharacteristic;
use app\models\contracts\IPrinter;
use vloop\entities\contracts\IField;

interface IProduct extends IPRinter
{
    /**
     * @param IField $newPrice
     * @return $this
     */
    public function changePrice(IField $newPrice): self;

    /**
     * @param IField $newCount
     * @return $this - меняет кол-во товара на складе.
     */
    public function changeCount(IField $newCount): self;

    /**
     * Удаляет продукт из бд, вместе со всеми зависимыми частями.
     */
    public function remove(): void;

    public function printTo(IMedia $media): IMedia;
}
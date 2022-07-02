<?php


namespace app\models\shop\products\contracts;


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

//    /**
//     * в параметры нужно добавить объект характеристики
//     * @param ICharacteristic $characteristic
//     * @return $this
//     */
//    public function addCharacteristic(ICharacteristic $characteristic): self;
//
//    /**
//     * в параметры нужно добавить объект характеристики
//     * @param ICharacteristic $characteristic
//     * @return IProduct
//     */
//    public function removeCharacteristic(ICharacteristic $characteristic): self;

    /**
     * @param IField $newCount
     * @return $this - меняет кол-во товара на складе.
     */
    public function changeCount(IField $newCount): self;

    /**
     * Удаляет продукт из бд, вместе со всеми зависимыми частями.
     */
    public function remove(): void;
}
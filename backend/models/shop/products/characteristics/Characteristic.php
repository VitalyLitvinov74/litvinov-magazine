<?php


namespace app\models\shop\products\characteristics;


use app\models\shop\products\characteristics\contract\ICharacteristic;
use app\models\contracts\IMedia;
use vloop\entities\contracts\IField;

class Characteristic implements ICharacteristic
{

    private $name;
    private $value;

    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Удаляет характеристику.
     */
    public function remove(): void
    {

    }

    /**
     * @param IField $field
     * @return $this
     */
    public function changeName(IField $field): ICharacteristic
    {

    }

    /**
     * @param IField $field
     * @return $this
     */
    public function changeValue(IField $field): ICharacteristic
    {
        // TODO: Implement changeValue() method.
    }

    /**
     * @param IMedia $media - источник информации куда необходимо записать себя
     * @return IMedia - источник информации с только что записанными данными
     */
    public function printTo(IMedia $media): IMedia
    {
        // TODO: Implement printTo() method.
    }
}
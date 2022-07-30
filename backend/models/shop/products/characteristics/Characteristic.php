<?php


namespace app\models\shop\products\characteristics;


use app\models\shop\products\characteristics\contracts\ICharacteristic;
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

    public function __destruct()
    {
        //none
    }

    /**
     * Удаляет характеристику.
     */
    public function remove(): void
    {
        $this->__destruct();
    }

    /**
     * @param IField $field
     * @return $this
     */
    public function changeName(IField $field): ICharacteristic
    {
        $this->name = $field->value();
        return $this;
    }

    /**
     * @param IField $field
     * @return $this
     */
    public function changeValue(IField $field): ICharacteristic
    {
        $this->value = $field->value();
        return $this;
    }

    /**
     * @param IMedia $media - источник информации куда необходимо записать себя
     * @return IMedia - источник информации с только что записанными данными
     */
    public function printTo(IMedia $media): IMedia
    {
        return $media
            ->add('name', $this->name)
            ->add('value', $this->value);
    }
}
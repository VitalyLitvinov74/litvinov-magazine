<?php


namespace app\models\shop\products\characteristics\decorators;


use app\models\contracts\IMedia;
use app\models\shop\products\characteristics\contract\ICharacteristic;
use vloop\entities\contracts\IField;

class CharacteristicMySQL implements ICharacteristic
{
    private $orirign;
    private $id;

    public function __construct(IField $id, ICharacteristic $characteristic)
    {
        $this->id = $id;
        $this->orirign = $characteristic;
    }

    /**
     * Удаляет характеристику.
     */
    public function remove(): void
    {

        $this->orirign->remove();
    }

    /**
     * @param IField $field
     * @return $this
     */
    public function changeName(IField $field): ICharacteristic
    {
        // TODO: Implement changeName() method.
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
    public function printTo(\app\models\contracts\IMedia $media): IMedia
    {
        // TODO: Implement printTo() method.
    }
}
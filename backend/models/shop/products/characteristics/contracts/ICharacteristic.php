<?php


namespace app\models\shop\products\characteristics\contract;


use app\models\trash\IPRinter;
use vloop\entities\contracts\IField;

interface ICharacteristic extends IPRinter
{
    /**
     * Удаляет характеристику.
     */
    public function remove(): void;

    /**
     * @param IField $field
     * @return $this
     */
    public function changeName(IField $field): self;

    /**
     * @param IField $field
     * @return $this
     */
    public function changeValue(IField $field): self;
}
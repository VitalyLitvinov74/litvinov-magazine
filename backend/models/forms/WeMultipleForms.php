<?php


namespace app\models\forms;


interface WeMultipleForms
{
    public function forms(): array;

    /**
     * @return array - представляет провалидированные поля в виде массива
     */
    public function multipleValidateFields():array;
}
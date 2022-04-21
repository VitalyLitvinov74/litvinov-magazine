<?php


namespace app\models\shop\product\characteristics\contracts;


use vloop\PrintYourSelf\PrintYourSelf;

interface ICharacteristic extends PrintYourSelf
{
    public function changeKey(): string;

    public function changeValue(): string;
}
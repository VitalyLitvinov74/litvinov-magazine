<?php


namespace app\models\shop\families\contracts;


use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface WeFamilies extends PrintYourSelf
{
    /**
     * @return IFamily[]
     */
    public function list(): array;

    public function addFamily(IForm $form): WeFamilies;

    public function lastAdded(): IFamily;

    public function printYourSelf(): array;
}
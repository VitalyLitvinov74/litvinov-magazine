<?php


namespace app\models\shop\families\contracts;


use vloop\PrintYourSelf\PrintYourSelf;

interface WeFamilies extends PrintYourSelf
{
    /**
     * @param IFamily $family
     * @return WeFamilies - возвращает семейство продуктов с новым добавленным семейством
     */
    public function addFamily(IFamily $family): WeFamilies;

    /**
     * @return IFamily[]
     */
    public function list():array;
}
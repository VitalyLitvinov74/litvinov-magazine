<?php


namespace app\models\contracts;


use app\models\contracts\IMedia;

interface IPrinter
{
    /**
     * @param IMedia $media - источник информации куда необходимо записать себя
     * @return IMedia - источник информации с только что записанными данными
     */
    public function printTo(IMedia $media): IMedia;
}
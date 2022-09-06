<?php


namespace app\models\collections;


use app\models\contracts\IMedia;
use app\models\contracts\IPrinter;
use app\models\contracts\ITrash;

interface ICollection extends IPRinter, ITrash
{
    /**
     * @return mixed - вернет список объектов, которые получились в следствии преобразования.
     */
    public function list();

    public function printTo(IMedia $media): IMedia;
}
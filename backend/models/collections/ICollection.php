<?php


namespace app\models\collections;


use app\models\contracts\IMedia;
use app\models\contracts\IPrinter;

interface ICollection extends IPRinter
{
    /**
     * @return mixed - вернет список объектов, которые получились в следствии преобразования.
     */
    public function list();
}
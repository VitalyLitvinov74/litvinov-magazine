<?php


namespace app\models\collections;


use app\models\trash\IMedia;
use app\models\trash\IPRinter;

interface ICollection extends IPRinter
{
    /**
     * @return mixed - вернет список объектов, которые получились в следствии преобразования.
     */
    public function list();
}
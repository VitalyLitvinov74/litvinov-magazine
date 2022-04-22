<?php


namespace app\models\contracts;


interface ToTrash
{
    /**
     * Выкидывает текущий элемент из системы.
     */
    public function moveToTrash(): void;
}
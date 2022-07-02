<?php


namespace app\models\contracts;


interface ITrash
{
    /**
     * Переносит объект в корзину
     */
    public function moveToTrash(): void;
}
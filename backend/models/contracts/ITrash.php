<?php


namespace app\models\trash;


interface ITrash
{
    /**
     * Переносит объект в корзину
     */
    public function moveToTrash(): void;
}
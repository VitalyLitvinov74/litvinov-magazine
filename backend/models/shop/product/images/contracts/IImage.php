<?php


namespace app\models\shop\product\images\contracts;


use vloop\PrintYourSelf\PrintYourSelf;

interface IImage extends PrintYourSelf
{
    /**
     * @return string - относительный путь до изображения.
     */
    public function path(): string;

    /**
     * @return array - результат функции pathInfo()
     */
    public function printYourSelf(): array;

    /**
     * Удаляет изображение как с диска, так и из бд
     */
    public function remove(): void;
}
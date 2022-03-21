<?php


namespace app\models\shop\products\families;


class EmptyFamily implements IProductFamily
{
    public function __construct()
    {
    }

    /**
     * Удалит семейство продуктов из системы.
     */
    public function remove(): void
    {

    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        return [];
    }
}
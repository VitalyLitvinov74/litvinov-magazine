<?php


namespace app\models\currencies;


class RUB implements ICurrency
{
    public function __construct()
    {

    }

    public function name(): string
    {
        return "ruble";
    }

    public function symbol(): string
    {
        return "₽";
    }

    public function shortName(): string
    {
        return "rub.";
    }
}
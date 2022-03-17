<?php


namespace app\models\currencies;


interface ICurrency
{
    /**
     * @return string - например usd|rub|eur
     */
    public function name(): string;

    /**
     * @return string - например $
     */
    public function symbol(): string;

    /**
     * @return string - короткое имя валюты, например: руб.
     */
    public function shortName(): string;
}
<?php


namespace app\models\chains;


interface IElementOfChain
{
    /**
     * Выполняет действие цепочки
     */
    public function execute(): void;
}
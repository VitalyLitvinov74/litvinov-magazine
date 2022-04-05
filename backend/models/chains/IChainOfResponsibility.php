<?php


namespace app\models\chains;


interface IChainOfResponsibility
{
    public function begin(): void;

    public function add(IElementOfChain $chainElement): IChainOfResponsibility;
}
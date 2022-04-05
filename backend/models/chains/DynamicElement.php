<?php


namespace app\models\chains;


class DynamicElement implements IElementOfChain
{
    private $dynamicAction;

    public function __construct(callable $dynamicAction)
    {
        $this->dynamicAction = $dynamicAction;
    }

    /**
     * Выполняет действие цепочки
     */
    public function execute(): void
    {
        call_user_func($this->dynamicAction);
    }
}
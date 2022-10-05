<?php


namespace app\models\consts;


use vloop\entities\contracts\IField;

class MinTreeLevel implements IField
{

    /**
     * @inheritDoc
     */
    public function value(): string
    {
        return '1';
    }

    /**
     * @inheritDoc
     */
    public function printYourSelf(): array
    {
        return ['level'=>$this->value()];
    }
}
<?php


namespace app\models\shop\products\families\decorators;


use app\models\shop\products\families\WeProductFamilies;

abstract class WeAbstractFamilies implements WeProductFamilies
{
    public function printYourSelf(): array
    {
        $self = [];
        foreach ($this->showAll() as $famyly){
            $self[] = $famyly->printYourSelf();
        }
        return $self;
    }
}
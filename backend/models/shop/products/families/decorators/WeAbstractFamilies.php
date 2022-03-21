<?php


namespace app\models\shop\products\families\decorators;


use app\models\shop\products\families\FamilySQLSpeaking;
use app\models\shop\products\families\IProductFamily;
use app\models\shop\products\families\WeProductFamilies;
use app\tables\TableFamilies;
use vloop\entities\contracts\IField;
use vloop\entities\fields\Field;

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

    public function productFamily(IField $fieldId): IProductFamily
    {
        return new FamilySQLSpeaking($fieldId);
    }
}
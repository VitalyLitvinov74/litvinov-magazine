<?php


namespace app\models\shop\families\decorators;


use app\models\shop\families\contracts\IFamily;
use app\models\shop\families\contracts\WeFamilies;
use vloop\entities\contracts\IForm;
use vloop\entities\yii2\queries\IImprovedQuery;

class WithOneRequestForFamilies implements WeFamilies
{
    public function __construct(IImprovedQuery $query, callable $call)
    {
    }

    /**
     * @return IFamily[]
     */
    public function list(): array
    {
        // TODO: Implement list() method.
    }

    public function addFamily(IForm $form): WeFamilies
    {
        // TODO: Implement addFamily() method.
    }

    public function lastAdded(): IFamily
    {
        // TODO: Implement lastAdded() method.
    }

    public function printYourSelf(): array
    {
        // TODO: Implement printYourSelf() method.
    }
}
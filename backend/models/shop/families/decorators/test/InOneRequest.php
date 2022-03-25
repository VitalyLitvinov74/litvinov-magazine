<?php


namespace app\models\shop\families\decorators\test;


use app\models\contracts\ICached;
use app\models\shop\families\contracts\IFamily;
use app\models\shop\families\contracts\WeFamilies;
use vloop\entities\contracts\IForm;

class InOneRequest implements WeFamilies
{
    public function __construct(ICached $cached)
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
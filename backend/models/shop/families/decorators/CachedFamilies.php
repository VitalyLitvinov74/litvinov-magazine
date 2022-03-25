<?php


namespace app\models\shop\families\decorators;


use app\models\shop\families\contracts\IFamily;
use app\models\shop\families\contracts\WeFamilies;
use app\tables\TableFamilies;
use vloop\entities\contracts\IForm;

class CachedFamilies implements WeFamilies
{
    /**
     * CachedFamilies constructor.
     * @param WeFamilies      $origin
     * @param TableFamilies[] $records
     */
    public function __construct(WeFamilies $origin, array $records)
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
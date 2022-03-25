<?php


namespace app\models\shop\families\decorators\test;


use app\models\contracts\ICached;
use app\models\shop\families\contracts\IFamily;
use app\models\shop\families\contracts\WeFamilies;
use vloop\entities\contracts\IForm;
use yii\db\ActiveRecord;

class CachedFamilies implements WeFamilies, ICached
{
    private $origin;
    private $cache = [];

    public function __construct(WeFamilies $origin)
    {
        $this->origin = $origin;
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

    /**
     * @param ActiveRecord[] $records
     * @return $this
     */
    public function addToCache(array $records): ICached
    {
        $this->cache = array_unique(
            array_merge(
                $this->cache,
                $records
            )
        );
        return $this;
    }
}
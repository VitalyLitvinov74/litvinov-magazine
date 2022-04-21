<?php


namespace app\models\shop\product;


use app\models\shop\product\contracts\IProduct;
use app\models\shop\product\contracts\IWarehouse;
use vloop\entities\exceptions\NotFoundEntity;
use vloop\entities\yii2\queries\IImprovedQuery;

class Warehouse implements IWarehouse
{
    private $query;

    public function __construct(IImprovedQuery $query)
    {
        $this->query = $query;
    }

    /**
     * @return IProduct[]
     */
    public function list():array
    {
        $list = [];
        foreach ($this->query->queryOfSearch()->each() as $productRecord){
            $list[] = new ProductByID($productRecord->id);
        }
        return $list;
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     * @throws NotFoundEntity
     */
    public function printYourSelf(): array
    {
        $list = [];
        foreach ($this->query->queryOfSearch()->each() as $productRecord){
            $snapshot = new ProductSnapshot($productRecord->id);
            $list[] = $snapshot->printYourSelf();
        }
        return $list;
    }
}
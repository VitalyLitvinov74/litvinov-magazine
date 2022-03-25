<?php


namespace app\models\cache;


use vloop\entities\yii2\queries\IImprovedQuery;

class CachedRecords
{
    private $query;

    public function __construct(IImprovedQuery $query)
    {
        $this->query = $query;
    }

    public function cachedRecord(): CachedRecord
    {

    }
}
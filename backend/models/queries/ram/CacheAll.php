<?php


namespace app\models\queries\ram;


use app\models\queries\ICache;
use vloop\entities\yii2\queries\IImprovedQuery;

class CacheAll implements ICache
{

    private $query;
    private $_cached = false;

    public function __construct(IImprovedQuery $query)
    {
        $this->query = $query;
    }

    /**
     * @inheritDoc
     */
    public function value()
    {
        if($this->_cached !== false){
            return $this->_cached;
        }
        $query = clone $this->query->queryOfSearch();
        $this->_cached = $query->all();
        return $this->_cached;
    }


    /**
     * Очищает кеш.
     */
    public function clean(): void
    {
        $this->_cached = false;
    }
}
<?php


namespace app\models\queries\ram;


use app\models\queries\ICache;
use vloop\entities\yii2\queries\IImprovedQuery;

class CacheOne implements ICache
{
    private $query;
    private $_cached = false;

    public function __construct(IImprovedQuery $query)
    {
        $this->query = $query;
    }

    /**
     * @return mixed - возвращает результат кеширования в ОП.
     */
    public function value()
    {
        if ($this->_cached !== false){
            return $this->_cached;
        }
        $this->_cached = $this->query->queryOfSearch()->one();
        return $this->_cached;
    }
}
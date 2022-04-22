<?php


namespace app\models\cache\ram;


use app\models\cache\ICache;
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

    /**
     * Очищает кеш.
     */
    public function clean(): void
    {
        $this->_cached = false;
    }
}
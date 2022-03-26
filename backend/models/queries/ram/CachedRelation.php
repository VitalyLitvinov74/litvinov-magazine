<?php


namespace app\models\queries\ram;


use app\models\queries\ICache;

class CachedRelation implements ICache
{
    private $relationName;
    private $mainCache;
    private $_cached = false;

    public function __construct(ICache $mainCache, string $relationsName)
    {
        $this->mainCache = $mainCache;
        $this->relationName = $relationsName;
    }

    /**
     * @return mixed - возвращает результат кеширования в ОП.
     */
    public function value()
    {
        if($this->_cached !== false){
            return $this->_cached;
        }
        $relationName = $this->relationName;
        $this->_cached = $this->mainCache->value()->$relationName;
        return $this->_cached;
    }
}
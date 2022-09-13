<?php


namespace app\models\shop\products;


use app\models\contracts\ID;
use app\models\shop\products\contracts\IProductCard;

class CacheKey
{
    private $identity;

    public function __construct(ID $identity)
    {
        $this->identity = $identity;
    }

    public function __toString()
    {
        return get_class($this->identity) . '.' . $this->identity->id();
    }

}
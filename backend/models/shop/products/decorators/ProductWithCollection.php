<?php


namespace app\models\shop\products\decorators;


use app\models\collections\ICollection;
use app\models\contracts\IMedia;
use app\models\contracts\IPrinter;
use app\models\shop\products\characteristics\contracts\ICharacteristic;
use app\models\shop\products\contracts\IProduct;
use vloop\entities\contracts\IField;

class ProductWithCollection implements IPrinter
{
    private $origin;
    private $characteristicsCollection;

    public function __construct(IProduct $product, ICollection $characteristics)
    {
        $this->origin = $product;
        $this->characteristicsCollection = $characteristics;
    }

    public function printTo(IMedia $media): IMedia
    {
        $this->origin->printTo($media);
        $this->characteristicsCollection->printTo($media);
        return $media;
    }

    public function changePrice(IField $newPrice): IProduct
    {
        return $this->origin->changePrice($newPrice);
    }

    public function changeCount(IField $newCount): IProduct
    {
        return $this->origin->changeCount($newCount);
    }

    public function remove(): void
    {
        $this->origin->remove();
        foreach ($this->characteristicsCollection->list() as $characteristic){
            /**@var ICharacteristic $characteristic*/
            $characteristic->remove();
        }
    }
}
<?php
declare(strict_types=1);

namespace app\shop\product\behaviors\product;

use app\shop\product\contracts\ProductInterface;
use app\shop\product\struct\ProductStruct;
use app\tables\TableProducts;
use vloop\entities\exceptions\NotSavedData;

final class DefaultProductBehavior implements ProductInterface
{
    public function __construct(private TableProducts $originRecord)
    {
    }

    public function changeInformation(ProductStruct $productStruct): ProductInterface
    {
        $this->originRecord->load((array) $productStruct);
        if($this->originRecord->save()){
            return $this;
        }
        throw new NotSavedData($this->originRecord->getErrors(), 422);
    }
}
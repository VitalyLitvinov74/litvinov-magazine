<?php
declare(strict_types=1);

namespace app\shop\product\behaviors\product;

use app\shop\contracts\ProductFormInterface;
use app\shop\product\contracts\ProductInterface;
use app\tables\TableProducts;
use vloop\entities\exceptions\NotSavedData;

final class DefaultProductBehavior implements ProductInterface
{
    public function __construct(private TableProducts $originRecord)
    {
    }

    public function changeInformation(ProductFormInterface $productForm): ProductInterface
    {
        $record = $this->originRecord;
        $record->title = $productForm->title;
        $record->description = $productForm->description;
        $record->short_description = $productForm->shortDescription;
        if($record->save()){
            return $this;
        }
        throw new NotSavedData($this->originRecord->getErrors(), 422);
    }
}
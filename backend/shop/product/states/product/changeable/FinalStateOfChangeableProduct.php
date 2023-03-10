<?php
declare(strict_types=1);

namespace app\shop\product\states\product\changeable;

use app\shop\product\contracts\ProductInterface;
use app\tables\TableProducts;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;

final class FinalStateOfChangeableProduct implements ProductInterface
{

    public function __construct(private readonly TableProducts $originRecord)
    {
    }

    public function changeInformation(IForm $productForm): ProductInterface
    {
        $this->originRecord->load($productForm->validatedFields());
        if($this->originRecord->save()){
            return $this;
        }
        throw new NotSavedData($this->originRecord->getErrors(), 422);
    }
}
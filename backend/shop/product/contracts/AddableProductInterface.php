<?php
declare(strict_types=1);

namespace app\shop\product\contracts;

use app\shop\contracts\ProductFormInterface;
use app\shop\exceptions\ProductException;
use app\shop\product\struct\ProductStruct;
use app\tables\TableProducts;
use vloop\entities\exceptions\NotValidatedFields;

interface AddableProductInterface
{
    /**
     * @return TableProducts
     * @throws NotValidatedFields
     * @throws ProductException
     */
    public function addBy(ProductFormInterface $productForm): TableProducts;
}
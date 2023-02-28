<?php
declare(strict_types=1);

namespace app\shop\product\contracts;

use app\shop\exceptions\ProductException;
use app\shop\product\struct\ProductStruct;
use app\tables\TableProducts;
use vloop\entities\exceptions\NotValidatedFields;

interface AddableProductInterface
{
    /**
     * @param ProductStruct $productStruct
     * @return TableProducts
     * @throws NotValidatedFields
     * @throws ProductException
     */
    public function add(ProductStruct $productStruct): TableProducts;
}
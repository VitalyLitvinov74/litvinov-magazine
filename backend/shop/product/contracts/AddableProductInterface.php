<?php
declare(strict_types=1);

namespace app\shop\product\contracts;

use app\shop\exceptions\ProductException;
use app\shop\product\struct\ProductStruct;
use app\tables\TableProducts;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;

interface AddableProductInterface
{
    /**
     * @param IForm $productForm
     * @return TableProducts
     * @throws NotValidatedFields
     * @throws ProductException
     */
    public function add(IForm $productForm): TableProducts;
}
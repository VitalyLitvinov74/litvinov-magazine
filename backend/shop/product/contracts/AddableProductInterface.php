<?php
declare(strict_types=1);

namespace app\shop\product\contracts;

use app\models\forms\CreateProductForm;
use app\models\structs\ProductStruct;
use app\shop\exceptions\ProductException;
use app\tables\TableProducts;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;

interface AddableProductInterface
{
    /**
     * @param CreateProductForm $productCardForm
     * @return TableProducts
     * @throws NotValidatedFields|ProductException
     */
    public function add(CreateProductForm $productCardForm): TableProducts;
}
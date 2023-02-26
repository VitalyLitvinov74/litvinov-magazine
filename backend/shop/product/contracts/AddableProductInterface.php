<?php
declare(strict_types=1);

namespace app\shop\product\contracts;

use app\shop\exceptions\ProductException;
use app\tables\TableProducts;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;

interface AddableProductInterface
{
    /**
     * @param IForm $productCardForm
     * @return TableProducts
     * @throws NotValidatedFields|ProductException
     */
    public function add(IForm $productCardForm): TableProducts;
}
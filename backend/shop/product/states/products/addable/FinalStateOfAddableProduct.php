<?php
declare(strict_types=1);

namespace app\shop\product\states\products\addable;

use app\shop\product\contracts\AddableProductInterface;
use app\shop\product\Product;
use app\tables\TableProducts;
use vloop\entities\contracts\IForm;

final class FinalStateOfAddableProduct implements AddableProductInterface
{

    public function add(IForm $productForm): TableProducts
    {
        $product = new Product(
            $record = new TableProducts()
        );
        $product->changeInformation($productForm);
        return $record;
    }
}
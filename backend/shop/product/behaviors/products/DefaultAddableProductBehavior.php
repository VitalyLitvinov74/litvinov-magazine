<?php
declare(strict_types=1);

namespace app\shop\product\behaviors\products;

use app\shop\contracts\ProductFormInterface;
use app\shop\product\contracts\AddableProductInterface;
use app\shop\product\Product;
use app\tables\TableProducts;

final class DefaultAddableProductBehavior implements AddableProductInterface
{

    public function addBy(ProductFormInterface $productForm): TableProducts
    {
        $product = new Product(
           $record = new TableProducts()
        );
        $product->changeInformation($productForm);
        $record->refresh();
        return $record;
    }
}
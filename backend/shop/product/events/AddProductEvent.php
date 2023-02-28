<?php
declare(strict_types=1);

namespace app\shop\product\events;

use app\models\forms\CreateProductForm;
use app\shop\product\contracts\AddableProductInterface;
use app\shop\product\Product;
use app\shop\product\struct\ProductStruct;
use app\tables\TableProducts;

final class AddProductEvent implements AddableProductInterface
{

    public function add(ProductStruct $productStruct): TableProducts
    {
        $product = new Product(
           $record = new TableProducts()
        );
        $product->changeInformation($productStruct);
        $record->refresh();
        return $record;
    }
}
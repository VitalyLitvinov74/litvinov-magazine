<?php
declare(strict_types=1);

namespace app\shop\seller;

use app\shop\contracts\ProductFormInterface;
use app\tables\TableProducts;

interface SellerInterface
{
    public function createProduct(ProductFormInterface $productForm): TableProducts;
}
<?php
namespace app\models\shop\products\family\decorators;

use app\models\shop\products\family\IProductFamily;
use app\models\shop\products\WeProducts;

class WithProducts implements IProductFamily
{
    private $products;
    private $origin;

    public function __construct(IProductFamily $origin, WeProducts $products)
    {
        $this->products = $products;
        $this->origin = $origin;
    }

    /**
     * Удалит семейство продуктов из системы.
     */
    public function remove(): void
    {
        foreach ($this->products->list() as $product){
            $product->remove();
        }
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        return array_merge(
            $this->origin->printYourSelf(),
            [
                'products'=>$this->products->printYourSelf()
            ]
        )
    }
}
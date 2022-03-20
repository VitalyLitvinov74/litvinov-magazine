<?php


namespace app\models\shop\products\family;


use app\models\shop\products\IProduct;
use app\models\shop\products\labels\IProductLabel;
use app\models\shop\products\WeProducts;

class ProductFamily implements IProductFamily
{
    private $label;
    private $products;

    /**
     * ProductFamily constructor.
     * @param IProductLabel $label
     * @param WeProducts    $products
     */
    public function __construct(IProductLabel $label, WeProducts $products)
    {
        $this->products = $products;
        $this->label = $label;
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        $products = $this->products->printYourSelf();
        $label = $this->label->printYourSelf();
        return array_merge(
            $label,
            ['products'=>$products]
        );
    }

    /**
     * Удалит семейство продуктов из системы.
     */
    public function remove(): void
    {
        foreach ($this->products->list() as $product){
            $product->remove();
        }
        $this->label->remove();
    }
}
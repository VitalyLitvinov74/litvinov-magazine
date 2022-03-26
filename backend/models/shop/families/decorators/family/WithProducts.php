<?php


namespace app\models\shop\families\decorators\family;


use app\models\shop\families\contracts\IFamily;
use app\models\shop\families\products\contracts\IProduct;
use app\models\shop\families\products\contracts\WeProducts;
use vloop\entities\contracts\IForm;

class WithProducts implements IFamily, WeProducts
{
    private $origin;

    public function __construct(IFamily $origin)
    {
        $this->origin = $origin;
    }

    public function remove(): void
    {
        $this->origin->remove();
        foreach ($this->productList() as $product) {
            $product->remove();
        }
    }

    /**
     * @param IForm $contentForm
     * @return IFamily
     */
    public function changeContent(IForm $contentForm): IFamily
    {
        $this->origin->changeContent($contentForm);
        return $this;
    }

    public function printYourSelf(): array
    {
        $products = [];
        foreach ($this->productList() as $product){
            $products[] = $product->printYourSelf();
        }
        return array_merge(
            $this->origin->printYourSelf(),
            [
                'products'=> $products
            ]
        );
    }

    public function addProduct(): WeProducts
    {

    }

    /**
     * @return IProduct[]
     */
    public function productList(): array
    {

    }
}
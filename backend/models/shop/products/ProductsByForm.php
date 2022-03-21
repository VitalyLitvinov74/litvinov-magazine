<?php


namespace app\models\shop\products\decorators;


use app\models\forms\ProductsForm;
use app\models\shop\products\IProduct;
use app\models\shop\products\WeProducts;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;

class ProductsByForm implements WeProducts
{
    private $form;

    /**
     * WeByForm constructor.
     * @param IForm|ProductsForm $form
     */
    public function __construct(IForm $form)
    {
        $this->form = $form;
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        return [];
    }

    /**
     * @return IProduct[]
     */
    public function list(): array
    {
        // TODO: Implement list() method.
    }

    /**
     * @param IProduct[] $products
     * @return WeProducts - вернет новый объект с добавленными продуктами/товарами.
     */
    public function mergeProducts(array $products): WeProducts
    {
        $originList = $this->origin->list();
        $selfList = [];

    }

    /**
     * @param IField $id
     * @return IProduct - Товар полученный из текущей коллекции взятый по ид.
     */
    public function product(IField $id): IProduct
    {
        // TODO: Implement product() method.
    }
}
<?php


namespace app\models\shop\products\decorators;


use app\models\shop\products\IProduct;
use app\tables\TableProducts;
use app\tables\TableProdutImages;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\yii2\Transaction;

class ImprovedProduct implements IProduct
{
    private $origin;

    public function __construct(IProduct $product)
    {
        $this->origin = new AtomicProduct(
            $product,
            new Transaction([
                TableProducts::class,
                TableProdutImages::class,
            ])
        );
    }

    /**
     * @param IForm $contentProductForm
     * @return IProduct
     * @throws \Throwable
     */
    public function changeContent(IForm $contentProductForm): IProduct
    {
        $this->origin->changeContent($contentProductForm);
        return $this;
    }

    /**
     * @param IForm $imagesForm
     * @return IProduct - возвращает новый объект с измененным изображением.
     * @throws \Throwable
     */
    public function changeImages(IForm $imagesForm): IProduct
    {
        $this->origin->changeImages($imagesForm);
        return $this;
    }

    /**
     * @param IField $field
     * @return IProduct - продукт.
     * @throws \Throwable
     */
    public function changeDefaultPrice(IField $field): IProduct
    {
        $this->origin->changeDefaultPrice($field);
        return $this;
    }

    /**
     * @param IField $field
     * @return IProduct
     * @throws \Throwable
     */
    public function changeCount(IField $field): IProduct
    {
        $this->origin->changeCount($field);
        return $this;
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        return $this->origin->printYourSelf();
    }
}
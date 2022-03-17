<?php


namespace app\models\shop\products\decorators;


use app\models\shop\products\IProduct;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\yii2\Transaction;

class AtomicProduct implements IProduct
{
    private $origin;
    private $trx;

    public function __construct(IProduct $origin, Transaction $trx)
    {
        $this->origin = $origin;
        $this->trx = $trx;
    }

    /**
     * @param IForm $contentProductForm
     * @return IProduct
     * @throws \Throwable
     */
    public function changeContent(IForm $contentProductForm): IProduct
    {
        return $this->trx->begin(
            function () use ($contentProductForm){
                return $this->origin->changeContent($contentProductForm);
            }
        );
    }

    /**
     * @param IForm $imagesForm
     * @return IProduct - возвращает новый объект с измененным изображением.
     * @throws \Throwable
     */
    public function changeImages(IForm $imagesForm): IProduct
    {
        return $this->trx->begin(
            function () use ($imagesForm){
                return $this->origin->changeImages($imagesForm);
            }
        );
    }

    /**
     * @param IField $field
     * @return IProduct - продукт.
     * @throws \Throwable
     */
    public function changeDefaultPrice(IField $field): IProduct
    {
        return $this->trx->begin(
            function () use ($field){
                $this->origin->changeDefaultPrice($field);
            }
        );
    }

    /**
     * @param IField $field
     * @return IProduct
     * @throws \Throwable
     */
    public function changeCount(IField $field): IProduct
    {
        return $this->trx->begin(
            function () use ($field){
                return $this->origin->changeCount($field);
            }
        );
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
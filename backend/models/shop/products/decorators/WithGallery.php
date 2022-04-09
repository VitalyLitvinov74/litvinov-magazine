<?php


namespace app\models\shop\products\decorators;


use app\models\shop\images\ProductGallery;
use app\models\shop\products\contracts\IProductCard;
use app\models\shop\images\contracts\IGallery;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\fields\Field;
use yii\helpers\VarDumper;

class WithGallery implements IProductCard
{
    private $originGallery;
    private $originProduct;

    public function __construct(IProductCard $origin, IGallery $gallery)
    {
        $this->originGallery = $gallery;
        $this->originProduct = $origin;
    }

    public function changeDescriptions(IForm $descriptionForm): IProductCard
    {
        return $this->originProduct->changeDescriptions($descriptionForm);
    }

    public function changeTitle(IField $title): IProductCard
    {
        return $this->originProduct->changeTitle($title);
    }

    public function copyToSystem(): IProductCard
    {
        $product = $this->originProduct->copyToSystem();
        $productGallery = new ProductGallery(
            $productId = new Field('id', $product->printYourSelf()['id'])
        );
        $productGallery->mergeGalleries($this->originGallery);
        return new self(
            $product,
            $productGallery
        );
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        return array_merge(
            $this->originProduct->printYourSelf(),
            [
                'images'=>$this->originGallery->printYourSelf()
            ]
        );
    }

    /**
     * Выкидывает текущий элемент из системы.
     */
    public function moveToTrash(): void
    {
        foreach ($this->originGallery->list() as $image){
            $image->moveToTrash();
        }
        $this->originProduct->moveToTrash();
    }
}
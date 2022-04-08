<?php


namespace app\models\shop\catalog\products\decorators;


use app\models\shop\catalog\products\contracts\IProductCard;
use app\models\shop\catalog\products\images\ProductGallery;
use app\models\shop\images\contracts\IGallery;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\fields\Field;

class WithGallery implements IProductCard
{
    private $gallery;
    private $origin;

    public function __construct(IProductCard $origin, IGallery $gallery)
    {
        $this->gallery = $gallery;
        $this->origin = $origin;
    }

    public function changeDescriptions(IForm $descriptionForm): IProductCard
    {
        return $this->origin->changeDescriptions($descriptionForm);
    }

    public function changeTitle(IField $title): IProductCard
    {
        return $this->origin->changeTitle($title);
    }

    public function copyToSystem(): IProductCard
    {
        $product = $this->origin->copyToSystem();
        $gallery = new ProductGallery(
            $productId = new Field('id', $product->printYourSelf()['id'])
        );
        $gallery->addImages('');
        return new self(// не много запутался.
            $product,
            $gallery
        );
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
                'images'=>$this->gallery->printYourSelf()
            ]
        );
    }

    /**
     * Выкидывает текущий элемент из системы.
     */
    public function moveToTrash(): void
    {
        foreach ($this->gallery->list() as $image){
            $image->moveToTrash();
        }
        $this->origin->moveToTrash();
    }
}
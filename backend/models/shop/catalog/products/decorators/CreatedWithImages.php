<?php


namespace app\models\shop\catalog\products\decorators;


use app\models\shop\catalog\products\contracts\IProductCard;
use app\models\shop\catalog\products\contracts\IProductCardFactory;
use app\models\shop\catalog\products\images\ProductGallery;
use app\models\shop\images\Gallery;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\fields\Field;

class CreatedWithImages implements IProductCardFactory
{
    private $origin;

    public function __construct(IProductCardFactory $origin)
    {
        $this->origin = $origin;
    }

    /**
     * @param IForm $form
     * @return IProductCard
     * @throws NotSavedData
     */
    public function createProductCard(IForm $form): IProductCard
    {
        $productCard = $this->origin->createProductCard($form);
        $productId = $productCard->printYourSelf()['id'];
        $gallery = new ProductGallery(new Field('id', $productId));
        $gallery->addImages($form);
        return $productCard;
    }
}
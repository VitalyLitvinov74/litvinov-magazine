<?php


namespace app\models\shop\products\decorators;


use app\models\collections\CollectionByForm;
use app\models\collections\ICollection;
use app\models\contracts\IMedia;
use app\models\media\ArrayMedia;
use app\models\media\JsonMedia;
use app\models\shop\products\contracts\IProduct;
use app\models\shop\products\contracts\IProductCard;
use app\models\shop\products\Product;
use vloop\entities\contracts\IForm;

class ProductCardWithCollection implements IProductCard
{
    private $origin;
    private $list;

    /**
     * CardsWithProducts constructor.
     * @param IProductCard $productCard
     * @param ICollection  $collection
     */
    public function __construct(IProductCard $productCard, ICollection $collection)
    {
        $this->origin = $productCard;
        $this->list = $collection;
    }

    /**
     * @param IMedia $media - источник информации куда необходимо записать себя
     * @return IMedia - источник информации с только что записанными данными
     */
    public function printTo(IMedia $media): IMedia
    {
        $this->origin->printTo($media);
        $this->list->printTo($media);
        return $media;
    }

    /**
     * @param IForm $form
     * @return $this - возвращает новую карточку товара с изменнным именем
     */
    public function changeTitle(IForm $form): IProductCard
    {
        $this->origin->changeTitle($form);
        return $this;
    }

    /**
     * @param IForm $form
     * @return $this - возвращает новую карточку товара с измененными кратким, и полным описаниями
     */
    public function changeDescriptions(IForm $form): IProductCard
    {
        $this->origin->changeDescriptions($form);
        return $this;
    }

    /**
     * Удаляет карточку товара
     */
    public function remove(): void
    {
        foreach ($this->list as $item){
            $item->remove();
        }
        $this->origin->remove();
    }
}
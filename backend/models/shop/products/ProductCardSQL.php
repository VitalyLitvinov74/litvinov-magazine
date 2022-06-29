<?php


namespace app\models\shop\products;


use app\models\shop\products\contracts\IProductCard;
use app\models\trash\IMedia;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;

class ProductCardSQL implements IProductCard
{
    public function __construct(IField $id)
    {
    }

    /**
     * @param IMedia $media - источник информации куда необходимо записать себя
     * @return IMedia - источник информации с только что записанными данными
     */
    public function printTo(IMedia $media): IMedia
    {
        
    }

    /**
     * @param IForm $form
     * @return $this - возвращает новую карточку товара с изменнным именем
     */
    public function changeTitle(IForm $form): IProductCard
    {
        // TODO: Implement changeTitle() method.
    }

    /**
     * @param IForm $form
     * @return $this - возвращает новую карточку товара с измененными кратким, и полным описаниями
     */
    public function changeDescriptions(IForm $form): IProductCard
    {
        // TODO: Implement changeDescriptions() method.
    }

    /**
     * @param IForm $form
     * @return $this - вернет новую карточку товара с изменной обще информацией
     */
    public function changeInformation(IForm $form): IProductCard
    {
        // TODO: Implement changeInformation() method.
    }

    /**
     * Удаляет карточку товара
     */
    public function remove(): void
    {
        // TODO: Implement remove() method.
    }
}
<?php


namespace app\models\shop\products;


use app\models\shop\products\contracts\IProductCard;
use app\models\contracts\IMedia;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\fields\FieldOfForm;

class ProductCard implements IProductCard
{
    private $title;
    private $shortDescription;
    private $description;

    public function __construct(IField $title,
                                IField $shortDescription,
                                IField $description)
    {
        $this->description = $description;
        $this->shortDescription = $shortDescription;
        $this->title = $title;
    }

    /**
     * @param IMedia $media - источник информации куда необходимо записать себя
     * @return IMedia - источник информации с только что записанными данными
     */
    public function printTo(IMedia $media): IMedia
    {
        return $media
            ->add('title', $this->title->value())
            ->add('shortDescription', $this->shortDescription->value())
            ->add('description', $this->description->value());
    }

    /**
     * @param IForm $form
     * @return $this - возвращает новую карточку товара с изменнным именем
     */
    public function changeTitle(IForm $form): IProductCard
    {
        return new ProductCard(
            new FieldOfForm($form,'title'),
            $this->shortDescription,
            $this->description
        );
    }

    /**
     * @param IForm $form
     * @return $this - возвращает новую карточку товара с измененными кратким, и полным описаниями
     */
    public function changeDescriptions(IForm $form): IProductCard
    {
        return new ProductCard(
            $this->title,
            new FieldOfForm($form, 'shortDescription'),
            new FieldOfForm($form, 'description')
        );
    }

    /**
     * Удаляет карточку товара
     */
    public function moveToTrash(): void
    {
        $this->__destruct();
    }

    public function __destruct()
    {

    }
}
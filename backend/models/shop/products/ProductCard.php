<?php


namespace app\models\shop\products;


use app\models\shop\products\contracts\IProductCard;
use app\models\trash\IMedia;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\fields\FieldOfForm;

class ProductCard implements IProductCard
{
    private $title;
    private $description;
    private $fullDescription;
    private $information;

    public function __construct(IField $title,
                                IField $description,
                                IField $fullDescription,
                                IField $information)
    {
        $this->information = $information;
        $this->fullDescription = $fullDescription;
        $this->description = $description;
        $this->title = $title;
    }

    /**
     * @param IMedia $media - источник информации куда необходимо записать себя
     * @return IMedia - источник информации с только что записанными данными
     */
    public function printTo(IMedia $media): IMedia
    {
        return $media
            ->add('title', $this->title)
            ->add('description', $this->description)
            ->add('fullDescription', $this->fullDescription)
            ->add('information', $this->information);
    }

    /**
     * @param IForm $form
     * @return $this - возвращает новую карточку товара с изменнным именем
     */
    public function changeTitle(IForm $form): IProductCard
    {
        return new ProductCard(
            new FieldOfForm($form,'title'),
            $this->description,
            $this->fullDescription,
            $this->information
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
            new FieldOfForm($form, 'description'),
            new FieldOfForm($form, 'fullDescription'),
            $this->information
        );
    }

    /**
     * @param IForm $form
     * @return $this - вернет новую карточку товара с изменной обще информацией
     */
    public function changeInformation(IForm $form): IProductCard
    {
        return new ProductCard(
            $this->title,
            $this->description,
            $this->fullDescription,
            new FieldOfForm($form, 'information')
        );
    }

    /**
     * Удаляет карточку товара
     */
    public function remove(): void
    {
        $this->__destruct();
    }

    public function __destruct()
    {

    }
}
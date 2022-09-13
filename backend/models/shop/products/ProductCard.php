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
    private IField $title;
    private IField $shortDescription;
    private IField $description;

    public function __construct(IField $title,
                                IField $shortDescription,
                                IField $description)
    {
        $this->description = $description;
        $this->shortDescription = $shortDescription;
        $this->title = $title;
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

    public function id(): int
    {
        return 0;
    }
}
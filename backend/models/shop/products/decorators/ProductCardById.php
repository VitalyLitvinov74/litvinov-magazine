<?php


namespace app\models\shop\products\decorators;


use app\models\collections\ObjectFactoryByQuery;
use app\models\contracts\IMedia;
use app\models\shop\products\contracts\IProductCard;
use app\tables\TableProductCards;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\fields\Field;
use yii\db\Query;

class ProductCardById implements IProductCard
{
    private $id;

    public function __construct(IField $id)
    {
        $this->id = $id;
    }

    /**
     * @param IMedia $media - источник информации куда необходимо записать себя
     * @return IMedia - источник информации с только что записанными данными
     */
    public function printTo(IMedia $media): IMedia
    {
        return $this->origin()->printTo($media);
    }

    /**
     * @param IForm $form
     * @return $this - возвращает новую карточку товара с изменнным именем
     */
    public function changeTitle(IForm $form): IProductCard
    {
        return $this->origin()->changeTitle($form);
    }

    /**
     * @param IForm $form
     * @return $this - возвращает новую карточку товара с измененными кратким, и полным описаниями
     */
    public function changeDescriptions(IForm $form): IProductCard
    {
        return $this->origin()->changeDescriptions($form);
    }

    /**
     * Удаляет карточку товара
     */
    public function remove(): void
    {
        $this->origin()->remove();
    }

    /**
     * @return IProductCard
     */
    private function origin()
    {
        $record = $this->record();
        /**@var TableProductCards $record */
        if ($record) {
            return new ProductCardMySQL(
                new Field('id', $record->id),
                new ProductCard(
                    new Field('title', $record->title),
                    new Field('shortDescription', $record->short_description),
                    new Field('description', $record->description)
                )
            );
        }
    }

    private function record(): TableProductCards
    {
       return TableProductCards::find()->where(['id' => $this->id->value()])->one();
    }
}
<?php


namespace app\models\shop\products;


use app\models\collections\ObjectFactoryByQuery;
use app\models\contracts\IMedia;
use app\models\shop\products\contracts\IProductCard;
use app\tables\TableProductCards;
use vloop\entities\contracts\IForm;
use vloop\entities\fields\Field;
use yii\db\Query;

class ProductCardByQuery extends ObjectFactoryByQuery implements IProductCard
{
    public function __construct(Query $query, array $params = [])
    {
        parent::__construct($query, $params);
    }

    /**
     * @param IMedia $media - источник информации куда необходимо записать себя
     * @return IMedia - источник информации с только что записанными данными
     */
    public function printTo(IMedia $media): IMedia
    {
        return $this->object()->printTo($media);
    }

    /**
     * @param IForm $form
     * @return $this - возвращает новую карточку товара с изменнным именем
     */
    public function changeTitle(IForm $form): IProductCard
    {
        return $this->object()->changeTitle($form);
    }

    /**
     * @param IForm $form
     * @return $this - возвращает новую карточку товара с измененными кратким, и полным описаниями
     */
    public function changeDescriptions(IForm $form): IProductCard
    {
        return $this->object()->changeDescriptions($form);
    }

    /**
     * Удаляет карточку товара
     */
    public function remove(): void
    {
        $this->object()->remove();
    }

    /**
     * @return IProductCard
     */
    protected function object()
    {
        $record = $this->record();
        /**@var TableProductCards $record*/
        if($record){
            return new ProductCardSQL(
                new Field('id',$record->id),
                new ProductCard(
                    new Field('title', $record->title),
                    new Field('shortDescription', $record->short_description),
                    new Field('description', $record->description)
                )
            );
        }
    }
}
<?php


namespace app\models\shop\products;


use app\models\cache\ICache;
use app\models\shop\products\contracts\IProductCard;
use app\models\trash\IMedia;
use app\tables\TableProductCards;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotFoundEntity;

class ProductCardCache implements IProductCard
{
    private $cache;

    public function __construct(ICache $productCachedRecord)
    {
        $this->cache = $productCachedRecord;
    }

    /**
     * @param IMedia $media - источник информации куда необходимо записать себя
     * @return IMedia - источник информации с только что записанными данными
     */
    public function printTo(IMedia $media): IMedia
    {
        return $media;
    }

    /**
     * @param IForm $form
     * @return $this - возвращает новую карточку товара с изменнным именем
     */
    public function changeTitle(IForm $form): IProductCard
    {
        $record = $this->record();
        $fields = $form->validatedFields();
        $record->title = $fields['title'];
        $record->save();
        return $this;
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

    private function record(): TableProductCards{
        if(is_null($this->cache->value())){
            throw new NotFoundEntity('Не существуте карточки продкута');
        }
        return $this->cache->value();
    }
}
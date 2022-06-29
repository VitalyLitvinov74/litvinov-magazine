<?php


namespace app\models\shop\products\contracts;


use app\models\trash\IMedia;
use app\models\trash\IPRinter;
use vloop\entities\contracts\IForm;

interface IProductCard extends IPRinter
{
    /**
     * @param IForm $form
     * @return $this - возвращает новую карточку товара с изменнным именем
     */
    public function changeTitle(IForm $form): self;

    /**
     * @param IForm $form
     * @return $this - возвращает новую карточку товара с измененными кратким, и полным описаниями
     */
    public function changeDescriptions(IForm $form): self;

    /**
     * @param IForm $form
     * @return $this - вернет новую карточку товара с изменной обще информацией
     */
    public function changeInformation(IForm $form): self;

    /**
     * Удаляет карточку товара
     */
    public function remove(): void;
}
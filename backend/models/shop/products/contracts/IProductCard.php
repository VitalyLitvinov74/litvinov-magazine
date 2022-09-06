<?php


namespace app\models\shop\products\contracts;


use app\models\contracts\IMedia;
use app\models\contracts\IPrinter;
use app\models\contracts\ITrash;
use vloop\entities\contracts\IForm;

interface IProductCard extends IPrinter, ITrash
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
     * Удаляет карточку товара
     */
    public function moveToTrash(): void;
}
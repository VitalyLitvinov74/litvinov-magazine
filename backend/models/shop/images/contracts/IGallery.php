<?php


namespace app\models\shop\images\contracts;


use app\models\contracts\ToTrash;
use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface IGallery extends PrintYourSelf
{
    /**
     * @return IImage[]
     */
    public function list(): array;

    /**
     * @return array - объект, преобразованный в массив, для чтения.
     */
    public function printYourSelf(): array;

    /**
     * @param IGallery $gallery
     * @return IGallery - вернет новую галерею или себя же. но уже со скопированными изображениями.
     */
    public function mergeGalleries(IGallery $gallery): IGallery;
}
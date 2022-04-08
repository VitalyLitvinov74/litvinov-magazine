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

    public function printYourSelf(): array;

    /**
     * @param IImage[] $images
     * @return IGallery - вернут новую галерею или себя же.
     */
    public function addImages(array $images): IGallery;
}
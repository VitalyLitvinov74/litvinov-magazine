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
     * @param IForm $imagesForm
     * @return IImage[]
     */
    public function addImages(IForm $imagesForm): array ;
}
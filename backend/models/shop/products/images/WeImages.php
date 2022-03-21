<?php


namespace app\models\shop\products\images;


use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface WeImages extends PrintYourSelf
{

    public function image(IField $id): IImage;

    public function addImages(IForm $imagesForm);

    /**
     * @return IImage[]
     */
    public function list(): array;
}
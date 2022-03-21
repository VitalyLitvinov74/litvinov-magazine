<?php


namespace app\models\shop\products\images;


use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface WeImages extends PrintYourSelf
{

    public function image(IField $id): IImage;

    /**
     * @param IImage[] $images
     * @return WeImages
     */
    public function mergeImages(array $images): WeImages;

    /**
     * @return IImage[]
     */
    public function list(): array;
}
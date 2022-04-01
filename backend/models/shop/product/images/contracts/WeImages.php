<?php
namespace app\models\shop\product\images\contracts;

use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface WeImages extends PrintYourSelf
{
    public function list():IImage;

    public function printYourSelf(): array;

    public function loadImages(IForm $imagesForm): WeImages;
}
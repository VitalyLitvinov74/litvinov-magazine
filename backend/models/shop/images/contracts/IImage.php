<?php
namespace app\models\shop\images\contracts;

use vloop\entities\contracts\IField;
use vloop\PrintYourSelf\PrintYourSelf;

interface IImage extends PrintYourSelf
{
    public function remove(): void;

    public function rename(IField $newName): IImage;
}
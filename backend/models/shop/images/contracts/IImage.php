<?php


namespace app\models\shop\images\contracts;


use app\models\contracts\ToTrash;
use vloop\entities\contracts\IField;
use vloop\PrintYourSelf\PrintYourSelf;

interface IImage extends PrintYourSelf, ToTrash
{
}
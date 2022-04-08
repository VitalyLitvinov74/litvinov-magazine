<?php


namespace app\models\shop\catalog\products\contracts;


use app\models\contracts\ToTrash;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface IProductCard extends PrintYourSelf, ToTrash
{
    public function changeDescriptions(IForm $descriptionForm): IProductCard;

    public function changeTitle(IField $title): IProductCard;

    public function copyToSystem(): IProductCard;
}
<?php


namespace app\models\shop\products\family;

use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface IProductFamily extends PrintYourSelf
{
    public function changeContent(IForm $form):IProductFamily;

    public function remove(): void;
}
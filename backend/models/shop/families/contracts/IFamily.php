<?php
namespace app\models\shop\families\contracts;

use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface IFamily extends PrintYourSelf
{
    public function remove(): void;

    public function changeContent(IForm $contentForm): IFamily;
}
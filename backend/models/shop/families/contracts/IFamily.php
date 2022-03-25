<?php


namespace app\models\shop\families\contracts;


use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface IFamily extends PrintYourSelf
{
    public function remove(): void;

    /**
     * @param IForm $contentForm
     * @return IFamily
     */
    public function changeContent(IForm $contentForm): IFamily;

    public function printYourSelf(): array;
}
<?php


namespace app\models\shop\products\families;


use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface IProductFamily extends PrintYourSelf
{

    public function changeTitle(IField $titleForm): IProductFamily;

    public function changeDesc(IField $descForm): IProductFamily;

    public function changeShortDesc(IField $shortDescForm): IProductFamily;

    /**
     * Удалит семейство продуктов из системы.
     */
    public function remove(): void ;
}
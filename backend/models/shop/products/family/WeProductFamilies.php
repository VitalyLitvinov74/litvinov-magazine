<?php


namespace app\models\shop\products\family;


use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface WeProductFamilies extends PrintYourSelf
{
    public function add(IForm $form): IProductFamily;

    public function productFamily(IField $field): IProductFamily;

    /**
     * @return ProductFamily[]
     */
    public function list(): array;
}
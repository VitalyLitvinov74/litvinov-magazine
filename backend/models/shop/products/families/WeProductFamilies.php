<?php


namespace app\models\shop\products\families;


use app\models\shop\products\IProduct;
use app\models\shop\products\labels\IProductLabel;
use app\models\shop\products\WeProducts;
use vloop\entities\contracts\IField;
use vloop\PrintYourSelf\PrintYourSelf;

interface WeProductFamilies extends PrintYourSelf
{
    /**
     * @param IProductFamily $family
     * @return WeProductFamilies
     */
    public function add(IProductFamily $family): WeProductFamilies;

    /**
     * @return IProductFamily[]
     */
    public function showAll(): array;

    /**
     * @param IField $fieldId
     * @return IProductFamily - вернет семейство продуктов по ид, из бд.
     */
    public function productFamily(IField $fieldId): IProductFamily;
}
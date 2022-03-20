<?php


namespace app\models\shop\products\family;


use app\models\shop\products\IProduct;
use app\models\shop\products\labels\IProductLabel;
use app\models\shop\products\WeProducts;
use vloop\entities\contracts\IField;
use vloop\PrintYourSelf\PrintYourSelf;

interface WeProductFamilies extends PrintYourSelf
{
    /**
     * @param IProductLabel $productLabel
     * @param WeProducts    $products
     * @return IProductFamily
     */
    public function add(IProductLabel $productLabel, WeProducts $products): IProductFamily;

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
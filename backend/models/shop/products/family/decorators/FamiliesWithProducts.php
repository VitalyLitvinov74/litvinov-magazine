<?php


namespace app\models\shop\products\family\decorators;


use app\models\shop\products\family\IProductFamily;
use app\models\shop\products\family\WeProductFamilies;
use app\models\shop\products\labels\IProductLabel;
use app\models\shop\products\WeProducts;
use vloop\entities\contracts\IField;

class FamiliesWithProducts implements WeProductFamilies
{
    private $origin;
    private $products;

    public function __construct(WeProductFamilies $origin, WeProducts $products)
    {
        $this->origin = $origin;
        $this->products = $products;
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        // TODO: Implement printYourSelf() method.
    }

    /**
     * @param IProductLabel $productLabel
     * @param WeProducts    $products
     * @return IProductFamily
     */
    public function add(IProductLabel $productLabel, WeProducts $products): IProductFamily
    {
        // TODO: Implement add() method.
    }

    /**
     * @return IProductFamily[]
     */
    public function showAll(): array
    {
        // TODO: Implement showAll() method.
    }

    /**
     * @param IField $fieldId
     * @return IProductFamily - вернет семейство продуктов по ид, из бд.
     */
    public function productFamily(IField $fieldId): IProductFamily
    {
        // TODO: Implement productFamily() method.
    }
}
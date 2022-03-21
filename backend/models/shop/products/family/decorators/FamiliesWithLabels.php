<?php


namespace app\models\shop\products\family\decorators;


use app\models\shop\products\family\IProductFamily;
use app\models\shop\products\family\WeProductFamilies;
use app\models\shop\products\labels\IProductLabel;
use app\models\shop\products\WeProducts;
use vloop\entities\contracts\IField;

class FamiliesWithLabels implements WeProductFamilies
{
    private $origin;
    private $label;

    public function __construct(WeProductFamilies $origin, IProductLabel $label)
    {
        $this->label = $label;
        $this->origin = $origin;
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
     * @return IProductFamily
     */
    public function add(): IProductFamily
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
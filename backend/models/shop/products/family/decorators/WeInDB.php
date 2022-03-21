<?php


namespace app\models\shop\products\family\decorators;


use app\models\shop\products\family\IProductFamily;
use app\models\shop\products\family\WeProductFamilies;
use vloop\entities\contracts\IField;

class WeInDB implements WeProductFamilies
{
    private $origin;

    public function __construct(WeProductFamilies $origin)
    {
        $this->origin = $origin;
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        return $this->origin->printYourSelf();
    }

    /**
     * @param IProductFamily $family
     * @return WeProductFamilies
     */
    public function add(IProductFamily $family): WeProductFamilies
    {
        $this->origin->add($family);
        return clone $this;
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
        return $this->origin->productFamily($fieldId);
    }
}
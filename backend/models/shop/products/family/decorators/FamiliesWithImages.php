<?php


namespace app\models\shop\products\family\decorators;


use app\models\shop\products\family\IProductFamily;
use app\models\shop\products\family\WeProductFamilies;
use app\models\shop\products\images\WeImages;
use app\models\shop\products\labels\IProductLabel;
use app\models\shop\products\WeProducts;
use vloop\entities\contracts\IField;

class FamiliesWithImages implements WeProductFamilies
{
    private $origin;
    private $images;

    public function __construct(WeProductFamilies $origin, WeImages $images)
    {
        $this->origin = $origin;
        $this->images = $images;
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        return  $this->origin->printYourSelf();
    }

    /**
     * @return IProductFamily //TODO: подтрерждается предположение что эта сущность должна существовать отдельно.
     */
    public function add(): IProductFamily
    {
        $this->origin->add();
    }

    /**
     * @return IProductFamily[]
     */
    public function showAll(): array
    {
        return $this->origin->showAll();
    }

    /**
     * @param IField $fieldId
     * @return IProductFamily - вернет семейство продуктов по ид, из бд.
     */
    public function productFamily(IField $fieldId): IProductFamily
    {
        return new FamilyWithImages(
            $this->origin->productFamily($fieldId)
        );
    }
}
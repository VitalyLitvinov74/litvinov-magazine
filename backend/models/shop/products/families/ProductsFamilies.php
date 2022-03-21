<?php


namespace app\models\shop\products\families;


use vloop\entities\contracts\IField;

class ProductsFamilies implements WeProductFamilies
{
    private $families;
    private $added = [];

    /**
     * ProductsFamilies constructor.
     * @param IProductFamily[] $families
     */
    public function __construct(array $families = [])
    {
        $this->families = $families;
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        return [];
    }

    /**
     * @param IProductFamily $family
     * @return WeProductFamilies
     */
    public function add(IProductFamily $family): WeProductFamilies
    {

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
     * @return IProductFamily - вернет семейство продуктов по ид, из текущей коллекции
     */
    public function productFamily(IField $fieldId): IProductFamily
    {

    }
}
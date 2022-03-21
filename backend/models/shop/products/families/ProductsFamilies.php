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
        $self = [];
        foreach ($this->showAll() as $family) {
            $self[] = $family->printYourSelf();
        }
        return $self;
    }

    /**
     * @param IProductFamily $family
     * @return WeProductFamilies
     */
    public function add(IProductFamily $family): WeProductFamilies
    {
        $this->added[] = $family;
        return $this;
    }

    /**
     * @return IProductFamily[]
     */
    public function showAll(): array
    {
        return array_merge(
            $this->families,
            $this->added
        );
    }

    /**
     * @param IField $fieldId
     * @return IProductFamily - вернет семейство продуктов по ид, из текущей коллекции
     */
    public function productFamily(IField $fieldId): IProductFamily
    {
        return new FamilySQLSpeaking($fieldId);
    }
}
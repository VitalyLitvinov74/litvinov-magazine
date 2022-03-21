<?php


namespace app\models\shop\products\family\decorators;


use app\models\shop\products\family\IProductFamily;

class FamilyWithImages implements IProductFamily
{
    private $origin;

    public function __construct(IProductFamily $origin)
    {
        $this->origin = $origin;
    }

    /**
     * Удалит семейство продуктов из системы.
     */
    public function remove(): void
    {
        // TODO: Implement remove() method.
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        // TODO: Implement printYourSelf() method.
    }
}
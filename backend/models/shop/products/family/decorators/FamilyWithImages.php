<?php


namespace app\models\shop\products\family\decorators;


use app\models\shop\products\family\IProductFamily;
use app\models\shop\products\images\WeImages;

class FamilyWithImages implements IProductFamily
{
    private $images;
    private $family;

    public function __construct(IProductFamily $family, WeImages $images)
    {
        $this->family = $family;
        $this->images = $images;
    }

    /**
     * Удалит семейство продуктов из системы.
     */
    public function remove(): void
    {
        $this->family->remove();
        foreach ($this->images->list() as $image) {
            $image->remove();
        }
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        return array_merge(
            $this->family->printYourSelf(),
            ['images' => $this->images->printYourSelf()]
        );
    }
}
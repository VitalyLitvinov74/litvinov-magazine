<?php


namespace app\models\shop\families\decorators;


use app\models\shop\families\contracts\IFamily;
use app\models\shop\images\contracts\WeImages;
use vloop\entities\contracts\IForm;

class FamilyWithImages implements IFamily
{

    public function __construct(IFamily $origin, WeImages $images)
    {

    }


    public function remove(): void
    {
        // TODO: Implement remove() method.
    }

    public function changeContent(IForm $contentForm): IFamily
    {
        // TODO: Implement changeContent() method.
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
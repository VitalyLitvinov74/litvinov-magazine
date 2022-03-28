<?php


namespace app\models\shop\families;


use app\models\shop\families\contracts\IFamily;
use vloop\entities\contracts\IForm;

class FamilyByForm implements IFamily
{
    public function __construct(IForm $form)
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
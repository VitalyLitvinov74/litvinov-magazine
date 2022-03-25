<?php


namespace app\models\shop\families\decorators;


use app\models\shop\families\contracts\IFamily;
use app\tables\TableFamilies;
use vloop\entities\contracts\IForm;

class WithOneRequestForFamily implements IFamily
{


    public function __construct(callable  $call)
    {

    }

    public function remove(): void
    {
        // TODO: Implement remove() method.
    }

    /**
     * @param IForm $contentForm
     * @return IFamily
     */
    public function changeContent(IForm $contentForm): IFamily
    {
        // TODO: Implement changeContent() method.
    }

    public function printYourSelf(): array
    {
        // TODO: Implement printYourSelf() method.
    }
}
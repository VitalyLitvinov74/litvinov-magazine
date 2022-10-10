<?php


namespace app\algorithms\trees;


use app\models\fields\AbstractField;
use vloop\entities\contracts\IField;

class MinTreeLevel extends AbstractField
{
    protected function value()
    {
        return 1;
    }
}
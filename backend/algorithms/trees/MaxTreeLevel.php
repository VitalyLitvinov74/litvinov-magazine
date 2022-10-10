<?php


namespace app\algorithms\trees;


use app\models\fields\AbstractField;
use app\models\fields\IField;

class MaxTreeLevel extends AbstractField
{
    protected function value()
    {
        return 999;
    }
}
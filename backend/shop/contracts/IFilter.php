<?php
declare(strict_types=1);

namespace app\shop\contracts;

use yii\db\Query;

interface IFilter
{
    public function query(): Query;
}
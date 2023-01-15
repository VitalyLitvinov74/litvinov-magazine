<?php
declare(strict_types=1);

namespace app\shop\contracts;

use app\tables\BaseTable;

interface IStruct
{
    public function struct(): BaseTable;
}
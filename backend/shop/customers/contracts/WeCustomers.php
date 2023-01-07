<?php

namespace app\shop\customers\contracts;

use app\tables\TableCustomers;
use vloop\entities\contracts\IField;

interface WeCustomers
{
    public function add(): TableCustomers;

    public function remove(IField $id): void;
}
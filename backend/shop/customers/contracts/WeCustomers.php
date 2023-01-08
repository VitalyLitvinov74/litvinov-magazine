<?php

namespace app\shop\customers\contracts;

use app\tables\TableCustomers;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;

interface WeCustomers
{
    public function addByForm(IForm $customerForm = null): TableCustomers;

    public function addDefault(): TableCustomers;

    public function remove(IField $id): void;
}
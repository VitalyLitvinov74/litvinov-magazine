<?php

namespace app\shop\customers\contracts;

use app\tables\TableCustomers;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;

interface WeCustomers
{

    public function addToList(): TableCustomers;

    public function remove(IField $id): void;
}
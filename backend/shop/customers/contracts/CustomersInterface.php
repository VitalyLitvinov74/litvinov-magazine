<?php

namespace app\shop\customers\contracts;

use app\tables\TableCustomers;
use vloop\entities\contracts\IField;

interface CustomersInterface extends AddableCustomersInterface
{

    public function addToList(): TableCustomers;

    public function remove(IField $id): void;
}
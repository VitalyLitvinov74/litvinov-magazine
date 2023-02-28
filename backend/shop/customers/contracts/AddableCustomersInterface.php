<?php
declare(strict_types=1);

namespace app\shop\customers\contracts;

use app\shop\customers\CustomerException;
use app\tables\TableCustomers;

interface AddableCustomersInterface
{
    /**
     * @return TableCustomers
     * @throws CustomerException
     */
    public function addToList(): TableCustomers;
}
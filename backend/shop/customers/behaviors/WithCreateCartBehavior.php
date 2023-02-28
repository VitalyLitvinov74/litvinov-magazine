<?php

namespace app\shop\customers\behaviors;

use app\models\GuidToken;
use app\shop\customers\contracts\AddableCustomersInterface;
use app\shop\customers\contracts\CustomersInterface;
use app\tables\TableCarts;
use app\tables\TableCustomers;
use vloop\entities\contracts\IField;

class WithCreateCartBehavior implements AddableCustomersInterface
{
    private $guidToken;

    public function __construct(private AddableCustomersInterface $origin)
    {
        $this->guidToken = new GuidToken();
    }

    public function addToList(): TableCustomers
    {
        $struct = $this->origin->addToList();
        $cartStruct = new TableCarts([
            'token'=>$this->guidToken->asString()
        ]);
        $cartStruct->link('customer', $struct);
        return $struct;
    }
}
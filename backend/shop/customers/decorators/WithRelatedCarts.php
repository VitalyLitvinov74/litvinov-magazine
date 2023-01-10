<?php

namespace app\shop\customers\decorators;

use app\models\GuidToken;
use app\shop\customers\contracts\WeCustomers;
use app\tables\TableCarts;
use app\tables\TableCustomers;
use vloop\entities\contracts\IField;

class WithRelatedCarts implements WeCustomers
{
    private $guidToken;

    public function __construct(private WeCustomers $origin)
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

    public function remove(IField $id): void
    {
        $this->origin->remove($id);
    }
}
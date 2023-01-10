<?php

namespace app\shop\customers\decorators;

use app\models\GuidToken;
use app\shop\carts\contracts\WeCarts;
use app\shop\customers\contracts\WeCustomers;
use app\tables\TableCustomers;
use app\tables\TableWishlists;
use vloop\entities\contracts\IField;

class WithRelatedWishlists implements WeCustomers
{

    private $wishlistToken;

    public function __construct(private WeCustomers $origin)
    {
        $this->wishlistToken = new GuidToken();
    }

    public function addToList(): TableCustomers
    {
        $customerStruct = $this->origin->addToList();
        $wishlistStruct = new TableWishlists([
            'token'=>$this->wishlistToken->asString()
        ]);
        $wishlistStruct->link('customer', $customerStruct);
        return $customerStruct;
    }

    public function remove(IField $id): void
    {
        $this->origin->remove($id);
    }
}
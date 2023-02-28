<?php

namespace app\shop\customers\behaviors;

use app\models\GuidToken;
use app\shop\customers\contracts\AddableCustomersInterface;
use app\tables\TableCustomers;
use app\tables\TableWishlists;

class WithCreateWishlistBehavior implements AddableCustomersInterface
{

    private $wishlistToken;

    public function __construct(private AddableCustomersInterface $origin)
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
}
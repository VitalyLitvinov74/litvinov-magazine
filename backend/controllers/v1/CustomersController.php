<?php

namespace app\controllers\v1;

use app\shop\customers\Customers;
use app\shop\customers\decorators\WithGenerateCartToken;
use app\shop\customers\decorators\WithGeneratedEmptyCart;
use app\shop\customers\decorators\WithRelatedCarts;
use app\shop\customers\decorators\WithRelatedWishlists;
use vloop\entities\fields\Field;
use yii\rest\Controller;

class CustomersController extends Controller
{
    public function actionCreate(){
        $customers = new WithRelatedCarts(
            new WithRelatedWishlists(
                new Customers()
            )
        );
        return $customers->addToList();
    }
}
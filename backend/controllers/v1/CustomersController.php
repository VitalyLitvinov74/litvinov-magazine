<?php

namespace app\controllers\v1;

use app\shop\customers\behaviors\WithCreateCartBehavior;
use app\shop\customers\behaviors\WithCreateWishlistBehavior;
use app\shop\customers\Customers;
use app\shop\customers\CustomersInterafce;
use app\shop\customers\decorators\WithGenerateCartToken;
use app\shop\customers\decorators\WithGeneratedEmptyCart;
use yii\rest\Controller;

class CustomersController extends Controller
{
    public function actionCreate(){
        $customers = new Customers();
        return $customers->addToList();
    }
}
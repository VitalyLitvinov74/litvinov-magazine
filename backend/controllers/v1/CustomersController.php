<?php

namespace app\controllers\v1;

use app\shop\customers\Customers;
use vloop\entities\fields\Field;
use yii\rest\Controller;

class CustomersController extends Controller
{
    public function actionCreate(){
        $customers = new Customers();
        return $customers->addDefault();
    }
}
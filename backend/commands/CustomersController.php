<?php

namespace app\commands;

use yii\console\Controller;

class CustomersController extends Controller
{
    public function actionRemove(string $token){
        $customers = new Customers();
        $customers->remove(
            new Field($token)
        );
    }
}
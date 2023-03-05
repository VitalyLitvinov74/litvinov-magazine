<?php

namespace app\controllers\v1;

use app\models\forms\EquipmentToCartForm;
use app\shop\carts\Cart;
use app\shop\exceptions\AddEquipmentException;
use app\shop\exceptions\RemoveEquipmentException;
use app\shop\product\struct\EquipmentStruct;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\fields\FieldOfForm;
use yii\rest\Controller;

class CartController extends Controller
{
    /**
     * @throws AddEquipmentException
     * @throws NotValidatedFields
     */
    public function actionAddEquipment()
    {
        $this->cart()
            ->addEquipment(
                EquipmentStruct::byForm(
                    new EquipmentToCartForm()
                )
            );
    }

    /**
     * @throws RemoveEquipmentException|NotValidatedFields
     */
    public function actionRemoveEquipment()
    {
        $this->cart()
            ->removeEquipment(
                EquipmentStruct::byForm(
                    new EquipmentToCartForm()
                )
            );
    }

    private function cart(): Cart
    {
        return new Cart( // корзина
            new FieldOfForm(
                $addToCartForm = new EquipmentToCartForm(),
                'cartToken'
            ),
            new FieldOfForm(
                $addToCartForm,
                'customerToken'
            )
        );
    }
}
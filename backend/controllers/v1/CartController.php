<?php

namespace app\controllers\v1;

use app\models\forms\EquipmentToCartForm;
use app\shop\carts\Cart;
use app\shop\carts\contracts\ICart;
use app\shop\carts\decorators\WithInStockEquipments;
use app\shop\carts\decorators\WithUniqueEquipments;
use app\shop\contracts\EquipmentStorageInterface;
use app\shop\product\equipments\EquipmentList;
use app\tables\TableEquipments;
use vloop\entities\fields\Field;
use vloop\entities\fields\FieldOfForm;
use yii\rest\Controller;

class CartController extends Controller
{
    public function actionAddEquipment()
    {
        $this->cart()
            ->addEquipment(new EquipmentToCartForm());
    }

    public function actionRemoveEquipment()
    {
        $this->cart()
            ->removeEquipment(new EquipmentToCartForm());
    }

    private function cart(): EquipmentStorageInterface
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
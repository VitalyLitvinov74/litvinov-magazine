<?php
declare(strict_types=1);

namespace app\shop\carts\decorators;

use app\shop\carts\contracts\ICart;
use app\tables\TableCarts;
use app\tables\TableEquipments;
use vloop\entities\contracts\IForm;

class WithInStockEquipments implements ICart
{

    public function __construct(private ICart $origin)
    {
    }

    public function addEquipment(IForm $addToCartForm): void
    {
        $fields = $addToCartForm->validatedFields();
        $equipment = TableEquipments::find()->where(['id' => $fields['equipmentId']])->one();
        if($equipment->count > 0){
            $this->origin->addEquipment($addToCartForm);
        }
    }

    public function removeEquipment(IForm $removeEquipment): void
    {
        $this->origin->removeEquipment($removeEquipment);
    }

    public function struct(): TableCarts
    {
        return $this->origin->struct();
    }
}
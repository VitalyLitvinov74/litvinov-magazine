<?php
declare(strict_types=1);

namespace app\shop\carts\decorators;

use app\shop\carts\AbstractCart;
use app\shop\carts\contracts\ICart;
use app\shop\carts\exceptions\DontAddEquipmentToCart;
use app\tables\TableCarts;
use app\tables\TableCartsViaEquipment;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use yii\helpers\ArrayHelper;

class WithDbUniqueEquipments implements ICart
{
    public function __construct(private ICart $origin)
    {
    }

    public function addEquipment(IForm $addToCartForm): void
    {
        $validatedFields = $addToCartForm->validatedFields();
        $record = TableCartsViaEquipment::find()->where([
            'equipment_id' => $validatedFields['equipmentId'],
            'cart_id' => $this->struct()->id
        ])->one();
        if (!$record) {
            $this->origin->addEquipment($addToCartForm);
            return;
        }
        $record->count++;
        if (!$record->save()) {
            throw new NotSavedData($record->getErrors(), 422);
        }
    }

    public function removeEquipment(IForm $equipmentId): void
    {
        $this->origin->removeEquipment($equipmentId);
    }

    public function struct(): TableCarts
    {
        return $this->origin->struct();
    }
}
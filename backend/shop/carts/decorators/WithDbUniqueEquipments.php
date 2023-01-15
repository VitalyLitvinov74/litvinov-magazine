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

    public function addEquipment(IForm $equipmentCartForm): void
    {
        $validatedFields = $equipmentCartForm->validatedFields();
        $record = $this->linkedRecord($validatedFields['equipmentId']);
        if (!$record) {
            $this->origin->addEquipment($equipmentCartForm);
            return;
        }
        $record->count++;
        if (!$record->save()) {
            throw new NotSavedData($record->getErrors(), 422);
        }
    }

    public function removeEquipment(IForm $equipmentCartForm): void
    {
        $fields = $equipmentCartForm->validatedFields();
        $linkedRecord = $this->linkedRecord($fields['equipmentId']);
        if(!$linkedRecord or $linkedRecord->count < 2){
            $this->origin->removeEquipment($equipmentCartForm);
        }
        $linkedRecord->count--;
        if(!$linkedRecord->save()){
            throw new NotSavedData($record->getErrors(), 422);
        }
    }

    public function struct(): TableCarts
    {
        return $this->origin->struct();
    }

    private function linkedRecord(int $equipmentId)
    {
        return TableCartsViaEquipment::find()->where([
            'equipment_id' => $equipmentId,
            'cart_id' => $this->struct()->id
        ])->one();
    }
}
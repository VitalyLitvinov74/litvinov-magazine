<?php
declare(strict_types=1);

namespace app\shop\carts\states;

use app\models\forms\EquipmentInCartForm;
use app\shop\contracts\IAddableEquipment;
use app\tables\TableBooking;
use app\tables\TableEquipments;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;
use yii\db\Query;

class CheckedForStock implements IAddableEquipment
{
    private Query $query;

    public function __construct(private IAddableEquipment $nextState)
    {
        $this->query = new Query();
    }

    /**
     * @param EquipmentInCartForm $equipmentCartForm
     * @throws NotValidatedFields
     */
    public function addEquipment(IForm $equipmentCartForm): void
    {
        $fields = $equipmentCartForm->validatedFields();
        $equipmentTable = TableEquipments::tableName();
        $bookingTable = TableBooking::tableName();
        $availableEquipmentCount = $this->query
            ->select(['count' => "$equipmentTable.count - COALESCE(sum($bookingTable.count), 0)"])
            ->from($equipmentTable)
            ->leftJoin($bookingTable, "$equipmentTable.id = $bookingTable.equipment_id")
            ->where(["$equipmentTable.id" => $fields['equipmentId']])
            ->one();
        if ($availableEquipmentCount > 0) {
            $this
                ->nextState
                ->addEquipment($equipmentCartForm);
        }
    }
}
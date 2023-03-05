<?php
declare(strict_types=1);

namespace app\shop\carts\events;

use app\shop\contracts\AddableEquipmentInterface;
use app\shop\product\struct\EquipmentStruct;
use app\tables\TableBooking;
use app\tables\TableEquipments;
use yii\db\Query;

final class CheckEquipmentInStockBehavior implements AddableEquipmentInterface
{
    private Query $query;

    public function __construct(private AddableEquipmentInterface $origin)
    {
        $this->query = new Query();
    }

    public function addEquipment(EquipmentStruct $equipmentStruct): void
    {
        $equipmentTable = TableEquipments::tableName();
        $bookingTable = TableBooking::tableName();
        $availableEquipmentCount = $this->query
            ->select(['count' => "$equipmentTable.count - COALESCE(sum($bookingTable.count), 0)"])
            ->from($equipmentTable)
            ->leftJoin($bookingTable, "$equipmentTable.id = $bookingTable.equipment_id")
            ->where(["$equipmentTable.id" => $equipmentStruct->id])
            ->one();
        if ($availableEquipmentCount > 0) {
            $this->origin->addEquipment($equipmentStruct);
        }
    }
}
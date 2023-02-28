<?php
declare(strict_types=1);

namespace app\shop\carts\events;

use app\shop\contracts\AddableEquipmentInterface;
use app\tables\TableBooking;
use app\tables\TableEquipments;
use vloop\entities\contracts\IForm;
use yii\db\Query;

final class CheckEquipmentInStockBehavior implements AddableEquipmentInterface
{
    private Query $query;

    public function __construct(private AddableEquipmentInterface $origin)
    {
        $this->query = new Query();
    }

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
            $this->origin->addEquipment($equipmentCartForm);
        }
    }
}
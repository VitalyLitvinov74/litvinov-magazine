<?php
declare(strict_types=1);

namespace app\shop\carts\conditions;

use app\models\forms\EquipmentToCartForm;
use app\models\IState;
use app\models\petrinet\AbstractPetriCondition;
use app\models\petrinet\PetriConditionInterface;
use app\shop\contracts\IAddableEquipment;
use app\tables\TableBooking;
use app\tables\TableEquipments;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;
use yii\db\Query;

final class EquipmentExistedInStockCondition extends AbstractPetriCondition
{
    private Query $query;

    public function __construct(private IForm $equipmentCartForm)
    {
        $this->query = new Query();
    }

    public function validate(): void
    {
        $fields = $this->equipmentCartForm->validatedFields();
        $equipmentTable = TableEquipments::tableName();
        $bookingTable = TableBooking::tableName();
        $availableEquipmentCount = $this->query
            ->select(['count' => "$equipmentTable.count - COALESCE(sum($bookingTable.count), 0)"])
            ->from($equipmentTable)
            ->leftJoin($bookingTable, "$equipmentTable.id = $bookingTable.equipment_id")
            ->where(["$equipmentTable.id" => $fields['equipmentId']])
            ->one();
        if ($availableEquipmentCount > 0) {
            $this->pushMark();
        }
        $this->removeMark();
    }
}
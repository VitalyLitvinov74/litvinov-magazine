<?php
declare(strict_types=1);

namespace app\shop\carts\decorators;

use app\models\forms\EquipmentInCartForm;
use app\shop\carts\contracts\ICart;
use app\tables\TableBooking;
use app\tables\TableCarts;
use app\tables\TableEquipments;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;
use yii\db\Query;
use yii\helpers\VarDumper;

class WithInStockEquipments implements ICart
{
    private $query;

    public function __construct(private ICart $origin)
    {
        $this->query = new Query();
    }

    /**
     * @param EquipmentInCartForm $equipmentCartForm
     * @return void
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
            $this->origin->addEquipment($equipmentCartForm);
        }
    }

    /**
     * @param EquipmentInCartForm $equipmentCartForm
     * @return void
     */
    public function removeEquipment(IForm $equipmentCartForm): void
    {
        $this->origin->removeEquipment($equipmentCartForm);
    }

    public function struct(): TableCarts
    {
        return $this->origin->struct();
    }
}
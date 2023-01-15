<?php
declare(strict_types=1);

namespace app\shop\carts\decorators;

use app\shop\carts\contracts\ICart;
use app\tables\TableBooking;
use app\tables\TableCarts;
use app\tables\TableEquipments;
use vloop\entities\contracts\IForm;
use yii\db\Query;
use yii\helpers\VarDumper;

class WithInStockEquipments implements ICart
{
    private $query;

    public function __construct(private ICart $origin)
    {
        $this->query = new Query();
    }

    public function addEquipment(IForm $addToCartForm): void
    {
        $fields = $addToCartForm->validatedFields();
        $equipmentTable = TableEquipments::tableName();
        $bookingTable = TableBooking::tableName();
        $availableEquipmentCount = $this->query
            ->select([
                'count' => "$equipmentTable.count - COALESCE(sum($bookingTable.count), 0 )"
            ])
            ->from($equipmentTable)
            ->leftJoin(
                $bookingTable,
                "$equipmentTable.id = $bookingTable.equipment_id",
            )
            ->where([
                    $equipmentTable .'.id' => $fields['equipmentId']
                ])
            ->one();
        if($availableEquipmentCount > 0){
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
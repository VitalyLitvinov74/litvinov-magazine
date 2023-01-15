<?php

namespace app\shop\carts\contracts;

use app\models\forms\EquipmentInCartForm;
use app\shop\contracts\IEquipmentStorage;
use app\shop\contracts\IStruct;
use app\tables\BaseTable;
use app\tables\TableCarts;
use Faker\Provider\Base;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use yii\db\ActiveRecord;

interface ICart extends IStruct, IEquipmentStorage
{
    /**
     * @param EquipmentInCartForm $equipmentCartForm
     */
    public function addEquipment(IForm $equipmentCartForm): void;

    /**
     * @param EquipmentInCartForm $equipmentCartForm
     */
    public function removeEquipment(IForm $equipmentCartForm): void;

    public function struct(): TableCarts;
}
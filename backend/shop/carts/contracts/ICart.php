<?php

namespace app\shop\carts\contracts;

use app\shop\contracts\IStruct;
use app\tables\BaseTable;
use app\tables\TableCarts;
use Faker\Provider\Base;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use yii\db\ActiveRecord;

interface ICart extends IStruct
{
    public function addEquipment(IForm $addToCartForm): void;

    public function removeEquipment(IForm $removeEquipment): void;

    /**
     * @return TableCarts
     */
    public function struct(): BaseTable;
}
<?php
declare(strict_types=1);

namespace app\shop\contracts;

use app\models\forms\EquipmentInCartForm;
use vloop\entities\contracts\IForm;

interface IEquipmentStorage extends IRemovableEquipment, IAddableEquipment
{

}
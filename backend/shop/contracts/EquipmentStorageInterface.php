<?php
declare(strict_types=1);

namespace app\shop\contracts;

use app\models\forms\EquipmentToCartForm;
use vloop\entities\contracts\IForm;

interface EquipmentStorageInterface extends RemovableEquipmentInterface, AddableEquipmentInterface
{

}
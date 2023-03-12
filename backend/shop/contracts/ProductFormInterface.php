<?php
declare(strict_types=1);

namespace app\shop\contracts;

use app\models\forms\CharacteristicForm;

/**
 * @property-read string $description;
 * @property-read string $shortDescription;
 * @property-read string $title;
 * @property-read EquipmentFormInterface[] $equipments;
 * @property-read CharacteristicFormInterface[] $characteristics;
 */
interface ProductFormInterface
{

}
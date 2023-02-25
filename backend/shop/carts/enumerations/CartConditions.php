<?php
declare(strict_types=1);

namespace app\shop\carts\enumerations;

use app\models\petrinet\PetriNodeName;

enum CartConditions: string implements PetriNodeName
{
    case CheckEquipmentInStore = 'CheckEquipmentInStore';

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->value;
    }
}
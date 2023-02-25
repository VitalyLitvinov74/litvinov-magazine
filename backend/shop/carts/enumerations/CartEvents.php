<?php
declare(strict_types=1);

namespace app\shop\carts\enumerations;

use app\models\petrinet\PetriNodeName;

enum CartEvents: string implements PetriNodeName
{

    case AddEquipmentToCart = 'AddEquipmentToCart';
    case RemoveEquipment = 'RemoveEquipment';


    public function name(): string
    {
        return $this->value;
    }
}
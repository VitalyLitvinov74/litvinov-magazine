<?php
declare(strict_types=1);

namespace app\shop\carts\enumerations;

use app\models\petrinet\PetriNodeName;

enum CartConditions implements PetriNodeName
{
    case CheckEquipmentInStore;

    /**
     * @return $this
     */
    public function name(): PetriNodeName
    {
        return $this;
    }
}
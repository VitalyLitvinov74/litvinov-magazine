<?php
declare(strict_types=1);

namespace app\models\petrinet;

interface PetriConditionInterface
{
    public function pushMark(): void;

    public function removeMark(): void;

    public function markExist(): bool;

    public function validate(): void;
}
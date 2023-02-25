<?php
declare(strict_types=1);

namespace app\models\petrinet;

abstract class AbstractPetriCondition implements PetriConditionInterface
{
    private array $marks;


    public function pushMark(): void
    {
        $this->marks[] = 1;
    }

    public function removeMark(): void
    {
        if(count($this->marks) > 0){
            array_pop($this->marks);
        }
    }

    public function markExist(): bool
    {
        if(count($this->marks) > 0){
            return true;
        }
        return false;
    }
}
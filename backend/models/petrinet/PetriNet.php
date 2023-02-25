<?php
declare(strict_types=1);

namespace app\models\petrinet;

final class PetriNet
{
    private array $transitions;

    /**
     * @var PetriEventInterface[]
     */
    private array $events;

    /**
     * @var PetriConditionInterface[]
     */
    private array $conditions;

    private array $preConditions;
    private array $postConditions;


    public function __construct()
    {
    }

    public function addTransition(
        PetriNodeName $from,
        PetriNodeName $to,
        TransitionType $transitionType = TransitionType::Default
    ): self {
        if($from instanceof PetriConditionInterface){
            $this->events[$to->name()] =  [
                'preConditions'=>$from,
            ];
        }else{
            $this->events[$from->name()] = [
                'postConditions'=> $to
            ];
        }
        return $this;
    }

    public function goToFinalState(): void
    {

    }

    public function addConditionForTransition(
        PetriNodeName $conditionName,
        PetriConditionInterface $condition
    ): self
    {
        $this->conditions[$conditionName->name()] = $condition;
        return $this;
    }

    public function addEvent(
        PetriNodeName $eventName,
        PetriEventInterface $event
    ): self
    {
        $this->events[$eventName->name()] = $event;
        return $this;
    }

    /**
     * @return PetriEventInterface[]
     */
    private function eventsWithoutPreConditions(): array{

    }

    /**
     * @return PetriConditionInterface[] - вернет только те условия которые есть в предусловиях,
     * но которых нет в постусловиях.
     */
    private function differenceBetweenPreConditionsAndPostConditions(): array{

    }
}
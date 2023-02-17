<?php
declare(strict_types=1);

namespace app\models;

final class StackFSM
{
    public function __construct(private array $stack = [])
    {
    }

    public function pushState(IState $state): self
    {
        if ($this->currentState() !== $state) {
            $this->stack[] = $state;
        }
        return $this;
    }

    public function popState(): self
    {
        array_pop($this->stack);
        return $this;
    }

    public function goToFinalState(...$data)
    {
        do {
            $result = $this->currentState()->execute(...$data);
            $this->popState();
        } while ($this->currentState()->isFinalState());
        return $result;
    }

    public function currentState(): IState{
        if(count($this->stack) > 0) {
            return $this->stack[array_key_last($this->stack)];
        }
        return new EmptyState();
    }
}
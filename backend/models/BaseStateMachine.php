<?php
declare(strict_types=1);

namespace app\models;

abstract class BaseStateMachine
{
    public function __construct(private array $states)
    {
    }

    public function addTransition(): self{

    }
}
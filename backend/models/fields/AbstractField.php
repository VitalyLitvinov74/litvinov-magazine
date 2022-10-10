<?php


namespace app\models\fields;


abstract class AbstractField implements IField
{
    abstract protected function value();
    
    public function asInt(): int
    {
        return (int) $this->value();
    }

    public function asFloat(): float
    {
        return (float) $this->value();
    }

    public function asBool(): bool
    {
        return (bool) $this->value();
    }

    public function asString(): string
    {
        return (string) $this->value();
    }
}
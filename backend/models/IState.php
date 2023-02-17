<?php
declare(strict_types=1);

namespace app\models;

interface IState
{
    /**
     * @param ...$data
     * @return mixed|void
     */
    public function execute(...$data);

    /**
     * @return bool
     */
    public function isFinalState(): bool;
}
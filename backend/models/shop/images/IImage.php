<?php


namespace app\models\shop\images;


interface IImage
{
    public function size(): int;

    public function webPath(): string;

    public function path(): string;
}
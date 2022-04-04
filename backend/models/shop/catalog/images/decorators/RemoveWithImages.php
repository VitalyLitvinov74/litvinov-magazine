<?php


namespace app\models\shop\catalog\images\decorators;


use app\models\contracts\ToTrash;
use app\models\shop\images\contracts\IGallery;

class RemoveWithImages implements ToTrash
{
    private $origin;
    private $gallery;

    public function __construct(ToTrash $origin, IGallery $gallery)
    {
        $this->origin = $origin;
        $this->gallery = $gallery;
    }

    public function moveToTrash(): void
    {
        foreach ($this->gallery->list() as $image){
            $image->moveToTrash();
        }
        $this->origin->moveToTrash();
    }
}
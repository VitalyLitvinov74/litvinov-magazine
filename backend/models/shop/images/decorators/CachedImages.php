<?php


namespace app\models\shop\images\decorators;


use app\models\queries\ICache;
use app\models\shop\images\contracts\IImage;
use app\models\shop\images\contracts\WeImages;
use vloop\entities\contracts\IForm;

class CachedImages implements WeImages
{
    private $cache;
    private $images;

    public function __construct(WeImages $images, ICache $cache)
    {
        $this->images = $images;
        $this->cache = $cache;
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {

    }

    public function addImages(IForm $imagesForm): WeImages
    {
        // TODO: Implement addImages() method.
    }

    /**
     * @return IImage[]
     */
    public function imagesList(): array
    {
        $records = $this->cache->value();
    }
}
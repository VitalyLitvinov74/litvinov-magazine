<?php


namespace app\models\collections;


use app\models\contracts\IMedia;
use app\models\contracts\IPrinter;
use app\models\media\ArrayMedia;
use yii\helpers\ArrayHelper;

class CollectionByArray extends AbstractCollection
{

    private $example;
    private $array;
    private $list = [];

    public function __construct(array $objectsAsArray, callable $exampleOfCreate)
    {
        $this->array = $objectsAsArray;
        $this->example = $exampleOfCreate;
    }

    /**
     * @return IPrinter[]
     */
    public function list()
    {
        $objectsAsArray = $this->array;
        if (empty($this->list)) {
            foreach ($objectsAsArray as $item) {
                $this->list[] = call_user_func($this->example, $item);
            }
        }
        return $this->list;
    }

    public function printTo(IMedia $media): IMedia
    {
        foreach ($this->list() as $object) {
            $object->printTo($media);
//            /**@var ArrayMedia $arrayMedia */
//            $arrayMedia = $object->printTo(new ArrayMedia());
//            $media->add($objectsType, $arrayMedia->fields(), true);
        }
        return $media;
    }
}
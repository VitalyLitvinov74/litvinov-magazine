<?php


namespace app\models\collections;


use app\models\contracts\IMedia;
use app\models\contracts\IPrinter;
use app\models\media\ArrayMedia;
use yii\helpers\ArrayHelper;

class CollectionByArray implements ICollection
{

    private $example;
    private $array;
    private $objectsType;
    private $list = [];

    public function __construct(array $objectsAsArray, string $objectsType, callable $exampleOfCreate)
    {
        $this->array = $objectsAsArray;
        $this->example = $exampleOfCreate;
        $this->objectsType = $objectsType;
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
        $objectsType = $this->objectsType;
        foreach ($this->list() as $object) {
            /**@var ArrayMedia $arrayMedia */
            $arrayMedia = $object->printTo(new ArrayMedia());
            $media->add($objectsType, $arrayMedia->fields(), true);
        }
        return $media;
    }
}
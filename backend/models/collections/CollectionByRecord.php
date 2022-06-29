<?php


namespace app\models\collections;


use yii\db\ActiveRecord;

abstract class CollectionByRecord implements ICollection
{

    private $list = [];

    /**
     * @return mixed - вернет пример объект который нужно превратить в коллекцию
     */
    abstract protected function exampleOfCreate();

    /**
     * @return ActiveRecord[]
     */
    abstract protected function records(): array ;

    /**
     * @return mixed - вернет список объектов, которые получились в следствии преобразования.
     */
    public function list()
    {
        $list = $this->list;
        foreach ($this->records() as $record){
            $object =  call_user_func($this->exampleOfCreate(), $record);
            $list[] = $object;
        }
        $this->list = $list;
        return $list;
    }
}
<?php


namespace app\models\collections;


use app\models\trash\IMedia;
use yii\db\ActiveRecord;
use yii\db\Query;

class ObjectCollectionByQuery extends CollectionByRecord
{
    private $_exampleOfCreate;
    private $query;

    public function __construct(Query $query, callable $exampleOfCreate)
    {
        $this->_exampleOfCreate = $exampleOfCreate;
        $this->query = $query;
    }

    /**
     * @return mixed - вернет пример объект который нужно превратить в коллекцию
     */
    protected function exampleOfCreate()
    {
        return $this->_exampleOfCreate;
    }

    protected function records(): array
    {
        return $this->query->all();
    }

    public function list()
    {
        return parent::list();
    }

    /**
     * @param IMedia $media - источник информации куда необходимо записать себя
     * @return IMedia - источник информации с только что записанными данными
     */
    public function printTo(IMedia $media): IMedia
    {
        return $media;
    }
}
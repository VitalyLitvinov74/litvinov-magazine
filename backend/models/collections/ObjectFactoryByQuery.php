<?php


namespace app\models\collections;


use app\tables\Table;
use vloop\entities\contracts\IField;
use yii\db\ActiveRecord;
use yii\db\Query;

abstract class ObjectFactoryByQuery
{
    private $query;
    private $_params;

    /**
     * ObjectFactoryByRecord constructor.
     * @param Query $query
     * @param IField[] $params
     */
    public function __construct(Query $query, array $params)
    {
        $this->_params = $params;
        $this->query = $query;
    }

    protected function params(): array{
        $list = [];
        foreach ($this->_params as $param){
            $paramKey = array_key_first($param->printYourSelf());
            $newKey = ":" . $paramKey;
            $list[$newKey] = $param->value();
        }
        return $list;
    }

    /**
     * @return array|bool|Table|ActiveRecord
     */
    protected function record() {
        $query = $this->query;
        $query->params = $this->params();
        return $this->query->one();
    }

    abstract protected function object();
}
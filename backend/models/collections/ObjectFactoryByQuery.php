<?php


namespace app\models\collections;


use app\tables\Table;
use vloop\entities\contracts\IField;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\helpers\VarDumper;

abstract class ObjectFactoryByQuery
{
    private $query;

    /**
     * ObjectFactoryByRecord constructor.
     * @param Query $query
     */
    public function __construct(Query $query)
    {
        $this->query = $query;
    }

    /**
     * @return array|bool|Table|ActiveRecord
     */
    protected function record() {
        $query = $this->query;
        $paramsList = $query->params;
        foreach ($paramsList as $paramKey => $param){
            if($param instanceof IField){
                $paramsList[$paramKey] = $param->value();
            }
        }
        $query->params = $paramsList;
        return $this->query->one();
    }

    abstract protected function object();
}
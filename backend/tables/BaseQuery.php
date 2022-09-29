<?php


namespace app\tables;


use vloop\entities\contracts\IField;
use yii\db\ActiveQuery;
use yii\helpers\VarDumper;

class BaseQuery extends ActiveQuery
{
    public function where($condition, $params = [])
    {
        foreach ($params as $name => $param) {
            if ($param instanceof IField) {
                $params[$name] = $param->value();
            }
        }
        return parent::where($condition, $params);
    }
}
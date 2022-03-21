<?php


namespace app\models\shop\products\families\decorators;


use app\models\shop\products\families\IProductFamily;
use app\tables\TableFamilies;
use vloop\entities\contracts\IField;
use vloop\entities\exceptions\NotFoundEntity;

abstract class AbstractFamily implements IProductFamily
{
    /**
     * @param IField $id
     * @param bool   $needleFull - указывает нужно ли загружать запись полностью
     * @return TableFamilies
     * @throws NotFoundEntity
     */
    protected function record(IField $id, bool $needleFull = false): TableFamilies
    {
        if ($needleFull) {
            $record = TableFamilies::find()->where([
                'id' => $id->value()
            ])->one();
            if ($record) {
                return $record;
            }
            throw new NotFoundEntity('Не удалось найти семейство продуктов с id = ' . $id->value());
        } else {
            return new TableFamilies([
                'id' => $id->value(),
                'isNewRecord' => false
            ]);
        }
    }
}
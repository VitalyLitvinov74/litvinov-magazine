<?php


namespace app\models\shop\products\families;


use app\models\shop\products\families\decorators\WeAbstractFamilies;
use app\models\shop\products\families\IProductFamily;
use app\models\shop\products\families\WeProductFamilies;
use app\models\shop\products\IProduct;
use app\tables\TableFamilies;
use vloop\entities\contracts\IField;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\fields\Field;
use vloop\entities\yii2\queries\IImprovedQuery;
use vloop\entities\yii2\queries\InTable;

class FamiliesSQLSpeaking extends WeAbstractFamilies implements WeProductFamilies
{
    private $query;

    public function __construct(IImprovedQuery $improvedQuery = null)
    {
        if (is_null($improvedQuery)) {
            $this->__construct(
                new InTable(TableFamilies::class)
            );
        }
        $this->query = $improvedQuery;
    }

    public function printYourSelf(): array
    {
        return parent::printYourSelf();
    }

    /**
     * @param IProductFamily $family
     * @return WeProductFamilies
     * @throws NotSavedData
     */
    public function add(IProductFamily $family): WeProductFamilies
    {
        $familySelf = $family->printYourSelf();
//
        $record = new TableFamilies([
            'title' => $familySelf['title'],
            'desc' => $familySelf['description'],
            'short_desc' => $familySelf['shortDescription']
        ]);
        if($record->save()){
            return new self($this->query);
        }
        throw new NotSavedData($record->getErrors(), 422);
    }

    /**
     * @return IProductFamily[]
     */
    public function showAll(): array
    {
        $all = [];
        $query = $this->query->queryOfSearch();
        foreach ($query->each() as $family){
            /**@var TableFamilies $family*/
            $all[] = $this->productFamily(
                new Field('id', $family->id)
            );
        }
        return $all;
    }

    /**
     * @param IField $fieldId
     * @return IProductFamily - вернет семейство продуктов по ид, из бд.
     */
    public function productFamily(IField $fieldId): IProductFamily
    {
        return parent::productFamily($fieldId);
    }
}
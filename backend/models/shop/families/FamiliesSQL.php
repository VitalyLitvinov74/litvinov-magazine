<?php
namespace app\models\shop\families;

use app\models\shop\families\contracts\IFamily;
use app\models\shop\families\contracts\WeFamilies;
use app\tables\TableFamilies;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\fields\Field;
use vloop\entities\yii2\queries\IImprovedQuery;
use vloop\entities\yii2\queries\InTable;

class FamiliesSQL implements WeFamilies
{
    private $query;
    private $_added = [];

    public function __construct(IImprovedQuery $query = null)
    {
        if(is_null($query)){
            $this->__construct(
                new InTable(TableFamilies::class)
            );
        }
        $this->query = $query;
    }

    /**
     * @return IFamily[]
     */
    public function list(): array
    {
        $list = [];
        $query = $this->query->queryOfSearch();
        $query->select('id');
        foreach ($query->each() as $record){
            /**@var TableFamilies $record*/
            $list[] = $this->family($record->id);
        }
        return $list;
    }

    public function addFamily(IForm $familyForm): WeFamilies
    {
        $fields = $familyForm->validatedFields();
        $record = new TableFamilies([
            'title' => $fields['title'],
            'desc' => $fields['description'],
            'short_desc' => $fields['shortDescription']
        ]);
        if($record->save()){
            $family = $this->family($record->id);
            $this->_added[] = $family;
            return $this;
        }
        throw new NotSavedData($record->getErrors(), 422);
    }

    public function lastAdded(): IFamily
    {
        if(empty($this->_added)){
            $query = $this->query->queryOfSearch();
            $id = $query
                ->orderBy('id desc')
                ->select('id')
                ->scalar();
            return $this->family($id);
        }
        return $this->_added[count($this->_added) - 1];
    }

    public function printYourSelf(): array
    {
        $list = [];
        foreach ($this->list() as $family){
            $list[] = $family->printYourSelf();
        }
        return $list;
    }

    private function family(int  $id): IFamily{
        return new FamilySQL(
            new Field('id', $id)
        );
    }
}
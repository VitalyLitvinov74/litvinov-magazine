<?php


namespace app\shop\categories;


use app\models\forms\CategoryForm;
use app\shop\categories\contracts\ICategory;
use app\shop\product\card\contracts\WeProductCards;
use app\tables\BaseQuery;
use app\tables\TableCategories;
use app\tables\TableProductCard;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\fields\Field;
use yii\db\Query;

class Categories implements WeProductCards
{
    private $exampleOfCreateCategory;
    private $queryOfSerach;

    public function __construct(Query $queryOfSearch = null, callable $categoryExample = null)
    {
        if(is_null($categoryExample)){
            $categoryExample = function (IField $id){
                return new CategorySql($id);
            };
        }
        $this->exampleOfCreateCategory = $categoryExample;

//        if(is_null($queryOfSearch)){
//            $queryOfSearch = new BaseQuery(TableCategories::class);
//        }
//        $this
    }

    /**
     * @param IForm|CategoryForm $productCardForm
     * @return TableProductCard
     * @throws NotSavedData
     * @throws NotValidatedFields
     */
    public function add(IForm $productCardForm): TableProductCard
    {
        $validatedFields = $productCardForm->validatedFields();
        $record = new TableCategories();
        $record->load($validatedFields['name']);
        if($record->save()){
            /**@var CategorySql $category*/
            $category = call_user_func(
                $this->exampleOfCreateCategory,
                new Field('id', $record->id)
            );
            $category->buildTree($validatedFields['parentId']);
        }
        throw new NotSavedData($record->getErrors(), 400);
    }

    public function remove(IField $id): void
    {
        TableCategories::deleteAll(['id'=>$id->value()]);
    }

    public function find(): Query
    {
        return new BaseQuery(TableCategories::class);
    }
}
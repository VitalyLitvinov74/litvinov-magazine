<?php


namespace app\models\shop\catalog\products;


use app\models\forms\ProductCardForm;
use app\models\forms\ProductForm;
use app\models\shop\catalog\products\contracts\IProductCard;
use app\models\shop\catalog\products\contracts\IProductCardFactory;
use app\tables\TableProductCards;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\fields\Field;

class ProductCardFactory implements IProductCardFactory
{

    /**
     * @param IForm|ProductCardForm $form
     * @return IProductCard
     * @throws NotValidatedFields
     * @throws NotSavedData
     */
    public function createProductCard(IForm $form): IProductCard
    {
        $fields = $form->validatedFields();
        $record = new TableProductCards();
        $record->title = $fields['title'];
        $record->description = $fields['description'];
        $record->short_description = $fields['shortDescription'];
        if($record->save()){
            return new ProductCard(
                new Field('id', $record->id)
            );
        }
        throw new NotSavedData($record->getErrors(), 422);
    }
}
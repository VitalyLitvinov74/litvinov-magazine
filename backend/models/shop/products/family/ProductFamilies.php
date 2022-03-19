<?php


namespace app\models\shop\products\family;


use app\tables\TableProductsFamilies;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;

class ProductFamilies implements WeProductFamilies
{

    public function add(IForm $form): IProductFamily
    {
        $fields = $form->validatedFields();
        $record = new TableProductsFamilies([
            'desc'=>
        ]);
    }

    public function productFamily(IField $field): IProductFamily
    {
        // TODO: Implement productFamily() method.
    }

    /**
     * @return ProductFamily[]
     */
    public function list(): array
    {
        // TODO: Implement list() method.
    }
}
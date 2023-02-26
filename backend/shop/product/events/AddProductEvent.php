<?php
declare(strict_types=1);

namespace app\shop\product\events;

use app\shop\product\contracts\AddableProductInterface;
use app\tables\TableProducts;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;

final class AddProductEvent implements AddableProductInterface
{

    public function add(IForm $productCardForm): TableProducts
    {
        $record = new TableProducts();
        $record->load($productCardForm->validatedFields(), '');
        if($record->save()){
            return $record;
        }
        throw new NotSavedData($record->getErrors(),400);
    }
}
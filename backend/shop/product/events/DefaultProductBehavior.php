<?php
declare(strict_types=1);

namespace app\shop\product\events;

use app\shop\product\contracts\ProductInterface;
use app\tables\TableProducts;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;

final class DefaultProductBehavior implements ProductInterface
{
    public function __construct(private TableProducts $originRecord)
    {
    }

    public function change(IForm $form): ProductInterface
    {
        $this->originRecord->load($form->validatedFields(), '');
        if($this->originRecord->save()){
            return $this;
        }
        throw new NotSavedData($this->originRecord->getErrors(), 422);
    }
}
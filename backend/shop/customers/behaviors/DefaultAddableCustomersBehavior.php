<?php
declare(strict_types=1);

namespace app\shop\customers\behaviors;

use app\shop\customers\contracts\AddableCustomersInterface;
use app\shop\customers\CustomerException;
use app\tables\TableCustomers;
use vloop\entities\contracts\IField;

final class DefaultAddableCustomersBehavior implements AddableCustomersInterface
{
    public function __construct(private IField $token)
    {

    }

    public function addToList(): TableCustomers
    {
        $record = new TableCustomers([
            'token' => $this->token->asString()
        ]);
        if($record->save()){
            return $record;
        }
        throw new CustomerException('не удалось создать покупателя');
    }
}
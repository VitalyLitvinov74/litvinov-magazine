<?php

namespace app\shop\carts;

use app\models\forms\EquipmentInCartForm;
use app\shop\carts\contracts\ICart;
use app\shop\carts\exceptions\DontAddEquipmentToCart;
use app\shop\carts\exceptions\DontRemoveEquipmentFromCart;
use app\tables\TableCarts;
use app\tables\TableCustomers;
use app\tables\TableEquipments;
use Exception;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotFoundEntity;
use vloop\entities\exceptions\NotValidatedFields;
use yii\db\ActiveRecord;
use yii\db\StaleObjectException;

class Cart implements ICart
{
    private $_struct = null;

    public function __construct(private IField $customerToken, private IField $cartToken)
    {
    }

    /**
     * @param EquipmentInCartForm $equipmentCartForm
     * @return void
     * @throws DontAddEquipmentToCart
     * @throws NotValidatedFields
     */
    public function addEquipment(IForm $equipmentCartForm): void
    {
        $validatedFields = $equipmentCartForm->validatedFields();
        $equipmentRecord = $this->equipmentRecord($validatedFields['equipmentId']);
        $this
            ->struct()
            ->link(
                'equipments',
                $equipmentRecord
            );
    }

    /**
     * @param EquipmentInCartForm $equipmentCartForm
     * @return void
     * @throws DontAddEquipmentToCart
     * @throws NotFoundEntity
     * @throws NotValidatedFields
     * @throws \yii\db\Exception
     * @throws StaleObjectException
     */
    public function removeEquipment(IForm $equipmentCartForm): void
    {
        $fields = $equipmentCartForm->validatedFields();
        $equipmentRecord = $this->equipmentRecord(
            $fields['equipmentId'],
            "remove"
        );
        $this->struct()
            ->unlink(
            'equipments',
            $equipmentRecord
        );
    }

    public function struct(): TableCarts
    {
        if (!is_null($this->_struct)) {
            return $this->_struct;
        }
        $struct = TableCarts::find()
            ->joinWith('customer customer')
            ->where(['carts.token' => $this->cartToken->asString()])
            ->andWhere(['customer.token' => $this->customerToken->asString()])
            ->one();
        if ($struct) {
            $this->_struct = $struct;
            return $struct;
        }
        throw new NotFoundEntity("Не удалось найти корзину");
    }

    /**
     * @param int $equipmentId
     * @param string $workForAction
     * @return TableEquipments
     * @throws DontAddEquipmentToCart|DontRemoveEquipmentFromCart
     */
    private function equipmentRecord(
        int $equipmentId,
        string $workForAction = 'add'
    ): TableEquipments {
        $equipmentRecord = TableEquipments::find()->where([
            'id' => $equipmentId
        ])->one();
        if ($equipmentRecord) {
            return $equipmentRecord;
        }
        if($workForAction == "add"){
            throw new DontAddEquipmentToCart('Продукт не найден');
        }
        throw new DontRemoveEquipmentFromCart("Продукт не найден");
    }
}
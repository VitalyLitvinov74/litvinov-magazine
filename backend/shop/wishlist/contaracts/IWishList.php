<?php

namespace app\shop\wishlist\contracts;

use app\models\forms\AddEquipmentToStorageForm;
use app\shop\carts\contracts\ICart;
use app\tables\TableCarts;
use app\tables\TableWishlists;
use vloop\entities\contracts\IForm;

interface IWishList extends ICart
{
    /**
     * @param AddEquipmentToStorageForm $addToCartForm
     * @return void
     */
    public function addEquipment(IForm $addToCartForm): void;

    /**
     * @param IForm $removeEquipment
     * @return void
     */
    public function removeEquipment(IForm $removeEquipment): void;


    public function struct(): TableWishlists;
}
<?php

namespace app\shop\wishlist\contracts;

use app\models\forms\EquipmentInCartForm;
use app\models\forms\EquipmentToWishlistForm;
use app\shop\carts\contracts\ICart;
use app\shop\contracts\IEquipmentStorage;
use app\shop\contracts\IStruct;
use app\tables\TableCarts;
use app\tables\TableWishlists;
use vloop\entities\contracts\IForm;

interface IWishList extends IStruct, IEquipmentStorage
{
    /**
     * @param EquipmentToWishlistForm $equipmentCartForm
     * @return void
     */
    public function addEquipment(IForm $equipmentCartForm): void;

    /**
     * @param EquipmentToWishlistForm $removeEquipment
     * @return void
     */
    public function removeEquipment(IForm $removeEquipment): void;


    public function struct(): TableWishlists;
}
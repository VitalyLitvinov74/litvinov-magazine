<?php
declare(strict_types=1);

namespace app\models\forms;

use vloop\entities\yii2\AbstractForm;

final class ChangeProductForm extends AbstractForm
{
    public $description;
    public $shortDescription;
    public $title;
    public $equipments;
    public $characteristics;
    public $categoryId;
}
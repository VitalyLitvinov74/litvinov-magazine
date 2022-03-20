<?php


namespace app\models\shop\products\labels;


use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface WeProductLabels extends PrintYourSelf
{
    public function add(IForm $productLabelForm): IProductLabel;

    /**
     * @return IProductLabel[] - вернет описания продуктов
     */
    public function list(): array;

    /**
     * @param IField $fieldId
     * @return IProductLabel - вернет объект ProductLabel взятый из бд.
     */
    public function label(IField $fieldId): IProductLabel;
}
<?php


namespace app\models\shop\families\decorators;


use app\models\shop\families\contracts\IFamily;
use app\models\shop\families\contracts\WeFamilies;
use app\models\shop\images\contracts\IImage;
use app\models\shop\images\ImageSQL;
use app\tables\TableFamiliesImages;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\fields\Field;
use yii\web\UploadedFile;

class FamiliesWithImages implements WeFamilies
{
    private $origin;
    private $_added = [];

    public function __construct(WeFamilies $families)
    {
        $this->origin = $families;
    }

    /**
     * @return IFamily[]
     */
    public function list(): array
    {

    }

    /**
     * @param IForm $form
     * @return WeFamilies
     */
    public function addFamily(IForm $form): WeFamilies
    {
        $family = new WithImages(
            $this->origin
                ->addFamily($form)
                ->lastAdded()
        );
        $family->addImages($form);
        $this->_added[] = $family;
        return $this;
    }

    public function lastAdded(): IFamily
    {
        // TODO: Implement lastAdded() method.
    }

    public function printYourSelf(): array
    {
        // TODO: Implement printYourSelf() method.
    }
}
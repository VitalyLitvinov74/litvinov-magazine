<?php

namespace app\models\collections;

use app\models\contracts\IMedia;
use app\models\contracts\IPrinter;
use app\models\media\ArrayMedia;
use app\models\media\JsonMedia;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

class CollectionByForm implements ICollection
{
    private $exampleOfCreate;
    private $form;
    private $objectsPathInForm;

    /**
     * @param callable $exampleOfCreate - пример создания объекта на фход в функцию будет передаваться
     * элемент массива $needleList
     * @param string $objectsPathInForm - 'foo.bar.objectType', will be used Array::helper
     * @param IForm $form
     */
    public function __construct(IForm $form, string $objectsPathInForm, callable $exampleOfCreate)
    {
        $this->form = $form;
        $this->exampleOfCreate = $exampleOfCreate;
        $this->objectsPathInForm = $objectsPathInForm;
    }

    /**
     * @return IPrinter[] - вернет список объектов, которые получились в следствии преобразования.
     * @throws NotValidatedFields
     * @throws \Exception
     */
    public function list()
    {
        $validatedFields = $this->form->validatedFields();
        $objectsArrayList = ArrayHelper::getValue($validatedFields, $this->objectsPathInForm, []);
        $objectList = [];
        foreach ($objectsArrayList as $item){
            $objectList[] = call_user_func($this->exampleOfCreate, $item);
        }
        return $objectList;
    }

    /**
     * @param IMedia $media - источник информации куда необходимо записать себя
     * @return IMedia - источник информации с только что записанными данными
     * @throws NotValidatedFields
     */
    public function printTo(IMedia $media): IMedia
    {
        $objectsType = end(explode('.', $this->objectsPathInForm));
        foreach ($this->list() as $object){
            /**@var ArrayMedia $arrayMedia*/
            $arrayMedia = $object->printTo(new ArrayMedia());
            $media->add($objectsType, $arrayMedia->fields(), true);
        }
        return $media;
    }
}
<?php


namespace app\models\collections;


use app\models\contracts\IMedia;
use vloop\entities\contracts\IForm;

class ObjectCollectionByForm implements ICollection
{
    private $form;
    private $collectionName;
    private $exampleOfCreate;

    public function __construct(IForm $form, string $collectionName, callable $exampleOfCreate)
    {
        $this->form = $form;
        $this->collectionName = $collectionName;
        $this->exampleOfCreate = $exampleOfCreate;
    }

    /**
     * @return mixed - вернет список объектов, которые получились в следствии преобразования.
     */
    public function list()
    {
        // TODO: Implement list() method.
    }

    /**
     * @param IMedia $media - источник информации куда необходимо записать себя
     * @return IMedia - источник информации с только что записанными данными
     */
    public function printTo(IMedia $media): IMedia
    {

    }
}
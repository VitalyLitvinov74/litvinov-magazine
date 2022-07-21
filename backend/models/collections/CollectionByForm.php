<?php

namespace app\models\collections;

use app\models\contracts\IMedia;
use app\models\contracts\IPrinter;
use app\models\media\JsonMedia;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

class CollectionByForm implements ICollection
{
    private $exampleOfCreate;
    private $form;
    private $objectsType;

    /**
     * @param callable $exampleOfCreate - пример создания объекта на фход в функцию будет передаваться
     * элемент массива $needleList
     * @param IForm $form
     * @param string $objectsType - 'foo.bar.name'
     */
    public function __construct(callable $exampleOfCreate, string $objectsType, IForm $form)
    {
        $this->form = $form;
        $this->exampleOfCreate = $exampleOfCreate;
        $this->objectsType = $objectsType;
    }

    /**
     * @return mixed - вернет список объектов, которые получились в следствии преобразования.
     * @throws NotValidatedFields
     */
    public function list()
    {
        $validatedFields = $this->form->validatedFields();
        $needleList = $this->searchKey($this->objectsType, $validatedFields);
        $objectList = [];
        foreach ($needleList as $item){
            $objectList[] = call_user_func($this->exampleOfCreate, $item);
        }
        return $objectList;
    }

    /**
     * @param IMedia $media - источник информации куда необходимо записать себя
     * @return IMedia - источник информации с только что записанными данными
     */
    public function printTo(IMedia $media): IMedia
    {
        $medias = [];
        foreach ($this->list() as $object){
            /**@var IPrinter $object*/
            $medias[] = $object->printTo(new JsonMedia())->toArray();
        }

        return $media->add($this->objectsType, $medias);
    }

    /**
     * @param string $searchKey Ключ который ищим
     * @param array $arr Массив в котором ищем
     * @return mixed
     */
    private function searchKey(string $searchKey, array $arr)
    {
        // Если в массиве есть элемент с ключем $searchKey, то ложим в результат
        if (isset($arr[$searchKey])) {
            return $arr[$searchKey];
        }
        // Обходим все элементы массива в цикле
        foreach ($arr as $key => $param) {
            // Если эллемент массива есть массив, то вызываем рекурсивно эту функцию
            if (is_array($param)) {
                $this->searchKey($searchKey, $param);
            }
        }

    }
}
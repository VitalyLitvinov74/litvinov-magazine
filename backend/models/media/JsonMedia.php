<?php


namespace app\models\media;


use app\models\contracts\IMedia;
use JsonSerializable;
use vloop\entities\standarts\json\IJsonStandart;
use Yii;
use yii\base\Arrayable;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

class JsonMedia implements IMedia, JsonSerializable
{
    private $needleAdd;

    public function __construct(array $needleAdd = [])
    {
        $this->needleAdd = $needleAdd;
    }

    /**
     * @param string $key
     * @param        $value
     * @return IMedia
     */
    public function add(string $key, $value): IMedia
    {
        $this->needleAdd[$key] = $value;
        return $this;
    }

    public function commit(): IMedia
    {
        return $this;
    }

    /**
     * В данном случае можем печатать себя в другие источники информации
     * @param IMedia $media - источник информации куда необходимо записать себя
     * @return IMedia - источник информации с только что записанными данными
     */
    public function printTo(IMedia $media): IMedia
    {
        foreach ($this->needleAdd as $key=>$val){
            $media->add($key, $val);
        }
        return $media;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link  https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4
     */
    public function jsonSerialize()
    {
        return $this->needleAdd;
    }
}
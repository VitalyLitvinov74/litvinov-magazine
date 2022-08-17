<?php


namespace app\models\media;


use app\models\contracts\IMedia;
use JsonSerializable;
use vloop\entities\standarts\json\IJsonStandart;
use Yii;
use yii\base\Arrayable;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\VarDumper;

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
    public function add(string $key, $value, bool $keyIsList = false): IMedia
    {
        if($keyIsList){
            $this->needleAdd[$key][] = $value;
        }
        else{
            $this->needleAdd[$key] = $value;
        }
        return $this;
    }

    public function commit(): IMedia
    {
        return $this;
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
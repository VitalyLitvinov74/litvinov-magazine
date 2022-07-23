<?php


namespace app\models\media;


use app\models\contracts\IMedia;
use vloop\entities\standarts\json\IJsonStandart;
use Yii;

class JsonMedia implements IMedia
{
    private $needleAdd;

    public function __construct(array $needleAdd = [])
    {
        $this->needleAdd = $needleAdd;
    }

    /**
     * @param string $key
     * @param $value
     * @param bool $keyIsList
     * @return IMedia
     */
    public function add(string $key, $value, bool $keyIsList = false): IMedia
    {
        if($keyIsList){
            $this->needleAdd[$key][] = $value;
        }else{
            $this->needleAdd[$key] = $value;
        }
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
     * @return array
     */
    public function toArray()
    {
        return $this->needleAdd;
    }
}
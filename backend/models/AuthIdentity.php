<?php

namespace app\models;

use app\tables\TableAuthIdentity;
use yii\web\IdentityInterface;

class AuthIdentity implements IdentityInterface
{

    private $identityStruct;

    public function __construct(TableAuthIdentity $identityStruct)
    {
        $this->identityStruct = $identityStruct;
    }

    /**
     * @inheritDoc
     */
    public static function findIdentity($id)
    {
        $identityStruct = TableAuthIdentity::find()->where(['id' => $id])->one();
        if($identityStruct){
            return new self($identityStruct);
        }
        return null;
    }

    /**
     * @inheritDoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $identityStruct = TableAuthIdentity::find()->where(['access_token'=>$token])->one();
        if($identityStruct){
            return new self($identityStruct);
        }
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->identityStruct->id;
    }

    /**
     * @inheritDoc
     */
    public function getAuthKey()
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
}

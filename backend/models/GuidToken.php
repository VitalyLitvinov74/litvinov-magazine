<?php

namespace app\models;

use vloop\entities\contracts\IField;
use vloop\entities\fields\Field;

class GuidToken implements IField
{

    public function __construct(private ?string $_token = null)
    {
    }

    public function asInt(): int
    {
        return $this->token()->asInt();
    }

    public function asFloat(): float
    {
        return $this->token()->asFloat();
    }

    public function asBool(): bool
    {
        return $this->token()->asBool();
    }

    public function asString(): string
    {
        return $this->token()->asString();
    }

    private function token(): IField{
        if(is_null($this->_token)){
            $this->_token = bin2hex( openssl_random_pseudo_bytes(16) );
        }
        return new Field($this->_token);
    }
}
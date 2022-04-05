<?php


namespace app\models\chains;


use Yii;
use yii\db\Connection;

class ChainInTransaction implements IChainOfResponsibility
{
    private $db;
    private $origin;

    /**
     * ChainInTransaction constructor.
     * @param IChainOfResponsibility $origin
     * @param Connection|null $db
     */
    public function __construct(IChainOfResponsibility $origin, Connection $db = null)
    {
        if(is_null($db)){
            return $this->__construct($origin, Yii::$app->db);
        }
        $this->origin = $origin;
        $this->db = $db;
    }

    /**
     * @throws \Throwable
     */
    public function begin(): void
    {
        $transaction = $this->db->beginTransaction();
        try{
            $this->origin->begin();
            $transaction->commit();
        }catch (\Throwable $e){
            $transaction->rollBack();
            throw $e;
        }
    }

    public function add(IElementOfChain $chainElement): IChainOfResponsibility
    {
        $this->origin->add($chainElement);
        return $this;
    }
}
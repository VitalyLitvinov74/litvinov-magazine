<?php


namespace app\models\chains;


class ChainOfResponsibility implements IChainOfResponsibility
{
    /**@var IElementOfChain[] */
    private $_added = [];
    private $_elements;

    public function __construct(array $elementsOfChain = [])
    {
        $this->_elements = $elementsOfChain;
    }

    /**
     *
     */
    public function begin(): void
    {
        /**@var IElementOfChain[] $elements*/
        $elements = array_merge(
            $this->_elements,
            $this->_added
        );
        foreach ($elements as $item){
            $item->execute();
        }
    }

    public function add(IElementOfChain $chainElement): IChainOfResponsibility
    {
        $this->_added[] = $chainElement;
        return $this;
    }
}
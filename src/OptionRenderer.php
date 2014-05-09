<?php namespace Nickstr\NodeDown;

use Nickstr\NodeDown\Nodes\NodeInterface;

class OptionRenderer
{
    /**
     * @var Nodes\NodeInterface
     */
    private $node;

    public function __construct(NodeInterface $node)
    {
        $this->node = $node;
    }

    public function render()
    {

    }
} 

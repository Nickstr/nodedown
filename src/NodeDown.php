<?php  namespace Nickstr\NodeDown; 

use Nickstr\NodeDown\Parsers\NodeParser;

class NodeDown
{
    private $nodeParser;

    public function __construct(NodeParser $nodeParser)
    {
        $this->nodeParser = $nodeParser;
    }

    public function get($node)
    {
        $node = $this->nodeParser->find($node);
    }
} 

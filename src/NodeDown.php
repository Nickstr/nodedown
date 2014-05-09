<?php  namespace Nickstr\NodeDown; 

use Nickstr\NodeDown\Nodes\Image;
use Nickstr\NodeDown\Nodes\Nodes;
use Nickstr\NodeDown\Parsers\NodeParser;
use Nickstr\NodeDown\Parsers\Parser;
use Nickstr\NodeDown\Renderers\Renderer;

class NodeDown
{
    private $parser;
    /**
     *
     */
    private $renderer;

    public function __construct(Parser $parser, Renderer $renderer)
    {
        $this->parser = $parser;
        $this->renderer = $renderer;
    }

    public function get($node)
    {
        $data = $this->parser->find($node);

        $nodes = new Nodes;
        $nodes->addNodeType('image', new Image);

        $node = $nodes->createNode($data);

        $node = $this->renderer->render($node);

        die(var_dump($node));
    }
} 

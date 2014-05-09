<?php

use Nickstr\NodeDown\Types\Body;
use Nickstr\NodeDown\Types\Image;

class NodeDownTest extends  \UnitTest
{
    public function test_can_render_body()
    {
        $parser = new \Nickstr\NodeDown\Parsers\NodeParser();
        $parser->addParser('body', new Body());

        $nodeDown = new \Nickstr\NodeDown\NodeDown($parser);

        $nodeDown->get('home.body');
    }

    public function test_can_render_image()
    {
        $parser = new \Nickstr\NodeDown\Parsers\NodeParser();
        $parser->addParser('image', new Image());

        $nodeDown = new \Nickstr\NodeDown\NodeDown($parser);

        $nodeDown->get('home.header');
    }
} 

<?php

class NodeDownTest extends  \UnitTest
{
    public function test_can_render_image()
    {
        $config = [
            'templates'     => '/vagrant/nodes/templates',
            'cache'         => '/vagrant/nodes/cache'
        ];


        $parser = new \Nickstr\NodeDown\Parsers\YMLParser();
        $renderer = new \Nickstr\NodeDown\Renderers\TwigRenderer($config);

        $nodeDown = new \Nickstr\NodeDown\NodeDown($parser, $renderer);

        $nodeDown->get('home.header');
    }
}

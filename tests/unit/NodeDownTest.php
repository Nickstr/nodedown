<?php

use Nickstr\NodeDown\NodeDown;
use Nickstr\NodeDown\Nodes\Types\Header;
use Nickstr\NodeDown\Nodes\Types\Youtube;
use Nickstr\NodeDown\Storage\Providers\Markdown;

class NodeDownTest extends \UnitTest
{
    public function setUp()
    {
        parent::setUp();
    }

    public function test_can_create()
    {
        $this->assertInstanceOf('Nickstr\NodeDown\NodeDown', $this->getNodeDown());
    }

    public function test_can_render_header()
    {
        $returns = 'header';
        $storage = $this->getStorage($returns);
        $nodeDown = $this->getNodeDown($storage);
        $nodeDown->addNodeType('header', new Header());

        $header = $nodeDown->render('foo', 'bar', 'header');
        $this->assertEquals('header', $header);
    }

    public function test_can_render_youtube()
    {
        $returns = 'http://www.youtube.com/watch?v=123';
        $storage = $this->getStorage($returns);
        $nodeDown = $this->getNodeDown($storage);
        $nodeDown->addNodeType('youtube', new Youtube());

        $options = [
            'width' => '200',
            'height' => '200'
        ];

        $video = $nodeDown->render('foo', 'bar', 'youtube', $options);
        $this->assertEquals('<iframe height="200" width="200" src="http://www.youtube.com/watch?v=123"></iframe>', $video);
    }





    // Private methods
    private function getNodeDown($storage = null)
    {
        if( !$storage) {
            $config = ['path' => __DIR__];
            $storage = new Markdown($config);
        }
        return new NodeDown($storage);
    }

    private function getStorage($returns)
    {
        $storage = Mockery::mock('Nickstr\NodeDown\Storage\Providers\Markdown')->makePartial();
        $storage->shouldReceive('get')->andReturn($returns);
        return $storage;
    }
} 

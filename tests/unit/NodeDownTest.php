<?php

use Nickstr\NodeDown\NodeDown;
use Nickstr\NodeDown\Nodes\Types\Body;
use Nickstr\NodeDown\Nodes\Types\Header;
use Nickstr\NodeDown\Nodes\Types\Image;
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

    public function test_can_render_body()
    {
        $returns = '[This link](http://example.net/) has no title attribute.';
        $storage = $this->getStorage($returns);
        $nodeDown = $this->getNodeDown($storage);
        $nodeDown->addNodeType('body', new Body());

        $body = $nodeDown->render('foo', 'bar', 'body');
        $this->assertEquals("<p><a href=\"http://example.net/\">This link</a> has no title attribute.</p>\n", $body);
    }

    public function test_can_render_image()
    {
        $returns = '![Alt text](/path/to/img.jpg "Optional title")';
        $storage = $this->getStorage($returns);
        $nodeDown = $this->getNodeDown($storage);
        $nodeDown->addNodeType('image', new Image());

        $options = [
            'width' => '200',
            'height' => '200'
        ];

        $image = $nodeDown->render('foo', 'bar', 'image', $options);
        $this->assertEquals("<p><img src=\"/path/to/img.jpg\" alt=\"Alt text\" title=\"Optional title\" /></p>\n", $image);
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

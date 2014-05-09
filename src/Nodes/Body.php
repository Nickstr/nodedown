<?php namespace Nickstr\NodeDown\Nodes;

use League\Flysystem\Adapter\Local as Adapter;
use League\Flysystem\Filesystem;

class Body
{
    public function render($config)
    {
        $filesystem = new Filesystem(new Adapter('/vagrant'));
        $content = $filesystem->read($config[0]['location']);

        return $content;
    }
} 

<?php  namespace Nickstr\NodeDown\Parsers;

use League\Flysystem\Adapter\Local as Adapter;
use League\Flysystem\Filesystem;
use Symfony\Component\Yaml\Yaml;

class YMLParser extends Parser
{
    public function find($node)
    {
        $filesystem = new Filesystem(new Adapter('/vagrant'));
        $file = $filesystem->read('nodes/content/' . str_replace('.', '/', $node) . '.yml');

        return $this->parse($file);
    }

    public function parse($file)
    {
        return Yaml::parse($file);
    }
} 

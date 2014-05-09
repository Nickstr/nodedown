<?php  namespace Nickstr\NodeDown\Parsers;

use League\Flysystem\Adapter\Local as Adapter;
use League\Flysystem\Filesystem;
use Nickstr\NodeDown\Types\Body;
use Symfony\Component\Yaml\Yaml;

class NodeParser
{
    protected $parsers;

    public function find($node)
    {
        $filesystem = new Filesystem(new Adapter('/vagrant'));
        $file = $filesystem->read('nodes/content/' . str_replace('.', '/', $node) . '.yml');

        $this->parse($file);
    }

    private function parse($file)
    {
        $node = Yaml::parse($file);

        $this->renderType($node);
    }

    private function renderType($node)
    {
        if( ! isset($this->parsers[$node[0]['type']])) {

        }

        return $this->parsers[$node[0]['type']]->render($node);
    }

    public function addParser($type, $parser)
    {
        $this->parsers[$type] = $parser;
    }
}

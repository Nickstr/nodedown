<?php namespace Nickstr\NodeDown;

use Nickstr\NodeDown\Nodes\NodeTypeNotFoundException;
use Nickstr\NodeDown\Nodes\Types\Header;
use Nickstr\NodeDown\Nodes\Types\Youtube;
use Nickstr\NodeDown\Storage\StorageProviderInterface;

class NodeDown
{
    private $nodeTypes;
    private $storageProvider;

    public function __construct(StorageProviderInterface $storageProvider)
    {
        $this->storageProvider = $storageProvider;
        $this->addNodeTypes();
    }

    public function render($page, $name, $type, array $options = [])
    {
        if( ! isset($this->nodeTypes[$type])) {
            throw new NodeTypeNotFoundException('No node type found for the type: ' . $type);
        }

        return $this->nodeTypes[$type]->get($page, $name, $options, $this->storageProvider);
    }

    public function addNodeType($name, $type)
    {
        $this->nodeTypes[$name] = $type;
    }

    private function addNodeTypes()
    {
        $this->addNodeType('header', new Header());
        $this->addNodeType('youtube', new Youtube());
    }
}

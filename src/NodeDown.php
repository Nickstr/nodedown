<?php namespace Nickstr\NodeDown;

use Nickstr\NodeDown\Nodes\NodeTypeNotFoundException;
use Nickstr\NodeDown\Storage\StorageProviderInterface;

class NodeDown
{
    private $nodeTypes;
    private $storageProvider;

    public function __construct(StorageProviderInterface $storageProvider)
    {
        $this->storageProvider = $storageProvider;
    }

    public function render($page, $name, $type, array $options = [])
    {
        if( ! isset($this->nodeTypes[$type])) {
            throw new NodeTypeNotFoundException('No node renderer found for the type: ' . $type);
        }

        $node = $this->nodeTypes[$type]->get($page, $name, $options, $this->storageProvider);
        return $this->renderOptions($node);
    }

    public function addNodeType($name, $type)
    {
        $this->nodeTypes[$name] = $type;
    }

    private function renderOptions($node)
    {
        $optionRenderer = new OptionRenderer($node);

        return $optionRenderer->render();
    }
}

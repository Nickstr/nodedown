<?php namespace Nickstr\NodeDown\Nodes\Types;

use Nickstr\NodeDown\Nodes\NodeInterface;
use Nickstr\NodeDown\Nodes\NodeTypeNotFoundException;
use Nickstr\NodeDown\Storage\StorageProviderInterface;

class Header implements NodeInterface
{
    public function get($page, $name, array $options = [], StorageProviderInterface $storage)
    {
        $node = $storage->get($page, $name);

        if( ! $node) {
            throw new NodeTypeNotFoundException("No node found for the page \"{$page}\" using the name \"{$name}\"");
        }

        return $this->render($node);
    }

    private function render($node)
    {
        return $node;
    }
}

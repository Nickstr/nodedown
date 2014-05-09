<?php namespace Nickstr\NodeDown\Nodes\Types;

use Nickstr\NodeDown\Nodes\NodeInterface;
use Nickstr\NodeDown\Storage\StorageProviderInterface;
use \Michelf\Markdown;

class Image implements NodeInterface
{
    private $tag = 'img';

    public function get($page, $name, array $options = [], StorageProviderInterface $storage)
    {
        $node = $storage->get($page, $name);

        if( ! $node) {
            throw new NodeTypeNotFoundException("No node found for the page \"{$page}\" using the name \"{$name}\"");
        }

        return $node;
    }
}

<?php  namespace Nickstr\NodeDown\Nodes; 

use Nickstr\NodeDown\Storage\StorageProviderInterface;

interface NodeInterface
{
    public function get($page, $name, array $options = [], StorageProviderInterface $storage);
} 

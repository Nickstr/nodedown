<?php namespace Nickstr\NodeDown\Storage;

interface StorageProviderInterface
{
    public function get($page, $key);
} 

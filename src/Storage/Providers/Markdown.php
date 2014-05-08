<?php namespace Nickstr\NodeDown\Storage\Providers;

use Nickstr\NodeDown\Storage\StorageProviderInterface;

class Markdown implements StorageProviderInterface
{
    public function __construct($config)
    {
        $this->folderPath = $config['path'];
    }

    public function get($page, $name)
    {
        if(is_file($this->getFilePath($page, $name))) {
            return file_get_contents($this->getFilePath($page, $name), 'r');
        }
    }

    protected function getFilePath($page, $name)
    {
        return "{$this->getBasePath()}/{$page}/{$name}.md";
    }

    protected function getBasePath()
    {
        return $_SERVER['DOCUMENT_ROOT'] . $this->folderPath;
    }
}

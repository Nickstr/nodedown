<?php  namespace Nickstr\NodeDown\Nodes\Types; 

use Nickstr\NodeDown\Nodes\NodeInterface;
use Nickstr\NodeDown\Storage\StorageProviderInterface;

class Youtube implements NodeInterface
{
    public function get($page, $name, array $options = [], StorageProviderInterface $storage)
    {
        $node = $storage->get($page, $name);

        if( ! $node) {
            throw new NodeTypeNotFoundException("No node found for the page \"{$page}\" using the name \"{$name}\"");
        }

        return preg_replace( '/\s+/', ' ', $this->render($node, $options));
    }

    private function render($node, $options)
    {
        $height = $this->getHeight($options);
        $width = $this->getWidth($options);
        $fullscreen = $this->allowFullScreen($options);

        return "<iframe {$height} {$width} {$fullscreen} src=\"{$node}\"></iframe>";
    }

    private function getHeight($options)
    {
        return isset($options['height']) ? "height=\"{$options['height']}\"" : null;
    }

    private function getWidth($options)
    {
        return isset($options['width']) ? "width=\"{$options['width']}\"" : null;
    }

    private function allowFullScreen($options)
    {
        return isset($options['allowfullscreen']) ? "allowfullscreen=\"1\"" : null;
    }
}

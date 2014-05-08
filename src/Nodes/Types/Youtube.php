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
        $height = isset($options['height']) ? "height=\"{$options['height']}\"" : null;
        $width = isset($options['width']) ? "width=\"{$options['width']}\"" : null;
        $fullscreen = isset($options['allowfullscreen']) ? "allowfullscreen=\"1\"" : null;

        return "<iframe {$height} {$width} {$fullscreen} src=\"{$node}\"></iframe>";
    }
}

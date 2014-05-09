<?php  namespace Nickstr\NodeDown\Renderers;

use Nickstr\NodeDown\Nodes\Node;
use Twig_Loader_Filesystem;
use Twig_Environment;

class TwigRenderer extends Renderer
{
    /**
     *
     */
    private $config;

    public function __construct($config)
    {

        $this->config = $config;
    }

    public function render(Node $node)
    {
        $loader = new Twig_Loader_Filesystem($this->config['templates']);
        $twig = new Twig_Environment($loader, array(
            'cache' => $this->config['cache'],
        ));

        return $node->render($twig);
    }
} 

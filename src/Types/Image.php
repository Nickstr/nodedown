<?php  namespace Nickstr\NodeDown\Types;

use League\Flysystem\Adapter\Local as Adapter;
use League\Flysystem\Filesystem;
use Twig_Environment;
use Twig_Loader_Filesystem;

class Image
{
    public function render($config)
    {
        $filesystem = new Filesystem(new Adapter('/vagrant'));
        $content = $config[0]['location'];

        if(isset($config[0]['template'])) {
            return $this->renderTemplate($config[0]['template'], $content);
        }

        return $content;
    }

    private function renderTemplate($template, $content)
    {
        $loader = new Twig_Loader_Filesystem('/vagrant/nodes/templates');
        $twig = new Twig_Environment($loader, array(
            'cache' => '/vagrant/nodes/cache',
        ));

        $template = $twig->loadTemplate($template);
        $template->render([
            'alt' => 'test',
            'src' => 'test',
            'title' => 'test'
        ]);
    }
} 

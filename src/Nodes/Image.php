<?php namespace Nickstr\NodeDown\Nodes;

class Image extends Node
{
    public function handles($type)
    {
        return strtolower($type) == 'image';
    }

    public function render($twig)
    {
        if($this->hasTemplate()) {
            $template = $twig->loadTemplate($this->getTemplate());
            return $template->render([
                'alt' => $this->getAlt(),
                'src' => $this->getLocation(),
                'title' => $this->getTitle()
            ]);
        }

        return $this->getLocation();
    }

    private function getLocation()
    {
        return $this->attributes['location'];
    }

    private function getAlt()
    {
        return isset($this->attributes['alt']) ? $this->attributes['alt'] : null;
    }

    private function getTitle()
    {
        return isset($this->attributes['title']) ? $this->attributes['title'] : null;
    }
} 

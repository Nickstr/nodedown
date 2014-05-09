<?php namespace Nickstr\NodeDown\Nodes;

class Node
{
    protected $attributes;

    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function getTemplate()
    {
        return $this->attributes['template'];
    }

    public function hasTemplate()
    {
        return $this->getTemplate() !== '';
    }
} 

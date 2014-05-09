<?php  namespace Nickstr\NodeDown\Nodes; 

class Nodes
{
    protected $nodeTypes;

    public function createNode($attributes)
    {
        if ( ! isset($this->nodeTypes[$attributes['type']])) {
            die('nope');
        }

        return $this->nodeTypes[$attributes['type']]->setAttributes($attributes);
    }

    public function addNodeType($name, $type)
    {
        $this->nodeTypes[$name] = $type;
    }
}

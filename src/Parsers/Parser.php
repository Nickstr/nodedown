<?php  namespace Nickstr\NodeDown\Parsers;

abstract class Parser
{
    abstract public function find($node);
    abstract public function parse($node);
}

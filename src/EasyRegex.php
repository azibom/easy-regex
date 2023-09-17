<?php

namespace EasyRegex;
 
class Builder {
    private $source = '';

    public function match($string) {
        return (bool) preg_match($this->getRegex(), $string);
    }

    public function getRegex() {
        return '/' . $this->source . '/';
    }

    public function start() {
        $this->source .= '^';
        
        return $this;
    }

    public function end() {
        $this->source .= '$';
        
        return $this;
    }

    public function any() {
        $this->source .= '.';
        
        return $this;
    }

    public function digit() {
        $this->source .= '\d';
        
        return $this;
    }

    public function word() {
        $this->source .= '\w';
        
        return $this;
    }

    public function whitespace() {
        $this->source .= '\s';
        
        return $this;
    }

    public function see($value) {
        $this->source .= '('.$this->cleanup($value).')';
        
        return $this;
    }

    public function maybeSee($value) {
        $this->source .= '('.$this->cleanup($value).')?';
        
        return $this;
    }

    public function cleanup($string) {
        return preg_quote($string, '/');
    }

    public function letter() {
        $this->source .= '([a-zA-Z])';

        return $this;
    }

    public function something()
    {
        $this->source .= '(?:.+)';

        return $this;
    }

    public function multiple() {
        $this->source .= '*';

        return $this;
    }

    public function oneOrMore() {
        $this->source .= '+';

        return $this;
    }

    public function zeroOrMore() {
        $this->source .= '*';

        return $this;
    }

    public function optional() {
        $this->source .= '?';

        return $this;
    }

    public function group() {
        $this->source .= '(' . $this->source . ')';
    }
}
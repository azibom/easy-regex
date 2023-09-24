<?php

use PHPUnit\Framework\TestCase;
use Azibom\EasyRegex\Builder;

class BuilderTest extends TestCase {
    public function testSeeOperation()
    {
        $builder = new Builder();
        $builder
            ->start()
            ->see("http")
            ->end();

        $this->assertTrue($builder->match("http"));
    }

    public function testDigitOperation()
    {
        $builder = new Builder();
        $builder
            ->start()
            ->digit()
            ->end();

        $this->assertTrue($builder->match("1"));
    }
}
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
}
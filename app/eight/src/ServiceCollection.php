<?php

namespace eight\src;

class ServiceCollection
{
    private array $singletons = [];
    private array $classes = [];

    public function addSingleton(string $abstract, string $concrete): void
    {
        $this->singletons[$abstract] = new $concrete();
    }

    public function addTransient($concrete)
    {
        $this->classes[$concrete] = $concrete;
    }
}

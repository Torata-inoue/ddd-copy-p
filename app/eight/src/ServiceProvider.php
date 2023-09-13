<?php

namespace eight\src;

class ServiceProvider
{
    public function __construct(
        private array $classes,
        private array $singletons
    ) {
    }

    /**
     * @template T
     * @param class-string<T> $class
     * @return T
     */
    public function getService(string $class)
    {
        return new $this->classes[$class]();
    }
}

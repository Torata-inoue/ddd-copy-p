<?php

readonly class FullName
{
    public string $FirstName;
    public string $LastName;

    public function FullName(string $FirstName, string $LastName)
    {
        $this->FirstName = $FirstName;
        $this->LastName = $LastName;
    }
}

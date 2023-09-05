<?php

readonly class FullName
{
    public function __construct(
        private FirstName $firstName,
        private LastName $lastName
    ) {

    }
}

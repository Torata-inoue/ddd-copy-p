<?php

function createUser(string $name): User
{
    $user = new User();
    $user->id = $name;
    return $user;
}

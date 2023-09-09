<?php

$userRepository = new \fifth\InMemoryUserRepository();
$program = new \fifth\Program($userRepository);
$program->createUser("nrs");

// データを取り出して確認
var_dump($userRepository->dictionary[0]);

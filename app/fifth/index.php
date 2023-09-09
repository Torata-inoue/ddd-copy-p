<?php

$userRepository = new \fifth\UserRepository();
$program = new \fifth\Program($userRepository);
$program->createUser("naruse");

<?php

$userRepository = new InMemoryUserRepository();
$userApplicationService = new UserApplicationService($userRepository);

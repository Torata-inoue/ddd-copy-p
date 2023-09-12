<?php

ServiceLocator::register(InMemoryUserRepository::class);
$userApplicationService = new \seventh\UserApplicationService();

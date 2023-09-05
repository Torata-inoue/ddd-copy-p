<?php

$fullName = 'john smith';
$tokens = explode(' ', $fullName);
$lastName = $tokens[0];
echo $lastName . PHP_EOL; // johnは名で姓ではない

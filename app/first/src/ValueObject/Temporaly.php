<?php

$userName = 'me';
if (strlen($userName) >= 3) {
    // 正常
} else {
    throw new Exception('以上な値です');
}

<?php

$dir = __DIR__.'/../data/';
$files = glob($dir.'database_test*');
foreach ($files as $file) {
    if (is_file($file)) {
        unlink($file);
    }
}
echo "Test database cleaned\n";

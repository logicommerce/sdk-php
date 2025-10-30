<?php
Phar::mapPhar();

require_once 'phar://' . __FILE__ . '/autoload.php';

/*
https://stackoverflow.com/questions/39679986/php-referencing-static-files-that-is-inside-a-phar-archive-from-html
Phar::mungServer(['REQUEST_URI', 'SCRIPT_NAME']);
Phar::webPhar(null, __DIR__ . "/index.php");

https://www.php.net/manual/en/phar.mungserver.php
https://www.php.net/manual/en/phar.webphar.php

maybe useful for sites or FWK
*/

__HALT_COMPILER();
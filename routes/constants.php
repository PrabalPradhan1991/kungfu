<?php
define('CURRENCY', '$');

if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    define('DS', "\\");
} else {
    define('DS', "/");
}
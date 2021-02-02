<?php
/**
 * $Id: bootstrap.php 2892 2011-08-14 15:11:50Z markbaker@phpexcel.net $.
 *
 * @author      Mark Baker
 */
chdir(__DIR__);

setlocale(LC_ALL, 'en_US.utf8');

// PHP 5.3 Compat
date_default_timezone_set('Europe/London');

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(__DIR__ . '/../Classes'));

// Define path to application tests directory
defined('APPLICATION_TESTS_PATH')
    || define('APPLICATION_TESTS_PATH', realpath(__DIR__));

// Define application environment
defined('APPLICATION_ENV') || define('APPLICATION_ENV', 'ci');

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, [
    realpath(APPLICATION_PATH . '/../Classes'),
    './',
    __DIR__,
    get_include_path(),
]));

/*
 * @todo Sort out xdebug in vagrant so that this works in all sandboxes
 * For now, it is safer to test for it rather then remove it.
 */
echo "PHPExcel tests beginning\n";

if (extension_loaded('xdebug')) {
    echo "Xdebug extension loaded and running\n";
    xdebug_enable();
} else {
    echo 'Xdebug not found, you should run the following at the command line: echo "zend_extension=/usr/lib64/php/modules/xdebug.so" > /etc/php.d/xdebug.ini' . "\n";
}

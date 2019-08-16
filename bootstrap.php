<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', realpath(__DIR__.'/').DS);
define('APP_PATH', realpath(__DIR__.'/app/').DS);
define('CONFIG_PATH', realpath(__DIR__.'/config/').DS);
define('STORAGE_PATH', realpath(__DIR__.'/storage/').DS);
define('RESOURCES_PATH', realpath(__DIR__.'/resources/').DS);
define('PUBLIC_PATH', realpath(__DIR__.'/public/').DS);
define('LIB_PATH', realpath(__DIR__.'/lib/').DS);

require ROOT_PATH.'vendor'.DS.'autoload.php';

$appName = php_sapi_name() == 'cli' ? 'console' : 'http';
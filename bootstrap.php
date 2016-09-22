<?php

if (PHP_SAPI == 'cli-server') {
    
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $file = __DIR__ . $_SERVER['REQUEST_URI'];

    if (is_file($file)) {
        return false;
    }
}

session_start();

require __DIR__ . '/vendor/autoload.php';

$settings = require __DIR__ . '/app/settings.php';
$env = require __DIR__ . '/app/env.php';

$env->models = $settings['settings']['models_path'];

ActiveRecord\Config::initialize(function($cfg) use ($env) {

	$cfg->set_model_directory($env->models);
	$cfg->set_connections([
		// 'development' => 'mysql://username:password@localhost/database_name'
		'development' => sprintf(
			'%s://%s:%s@%s/%s',
			$env->database->driver,
			$env->database->username,
			$env->database->password,
			$env->database->host,
			$env->database->dbname
		)
	]);
});

$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/app/dependencies.php';

// Register middleware
require __DIR__ . '/app/middleware.php';

// Register routes
require __DIR__ . '/app/routes.php';

// Run!
$app->run();
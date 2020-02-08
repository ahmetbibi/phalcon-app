<?php

$loader = new \Phalcon\Loader();

$loader->registerNamespaces(
  [
      "tennisClub"    => $config->application->modelsDir
  ]
);

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir
    ]
)->register();
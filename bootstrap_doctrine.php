<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array(__DIR__ . "/src/CubicMushroom/PostcodeDataLoader/Entity");
$isDevMode = true;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'geocoder',
    'password' => 'AvufmpsQCh5ThK39',
    'dbname'   => 'geocoder',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

return $entityManager;
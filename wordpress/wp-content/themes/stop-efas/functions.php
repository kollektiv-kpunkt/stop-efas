<?php

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

include __DIR__ . '/inc/inc.vite.php';
include __DIR__ . '/inc/inc.acf.php';
include __DIR__ . '/inc/inc.themesupports.php';
include __DIR__ . '/inc/inc.themefunctions.php';
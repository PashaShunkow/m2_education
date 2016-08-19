<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'App.php';
$app = new App();
$app->run();

?>
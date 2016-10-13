<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';


$app = new \Slim\App;

require_once('../app/api/airports.php');
require_once('../app/api/flights.php');
require_once('../app/api/customers.php');
require_once('../app/api/trips.php');

$app->run();
?>
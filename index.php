<?php

require_once("config.php");
require_once("router.php");
require_once("registry.php");
require_once("controllers/Controller.php");
require_once("models/Model.php");

$registry = new Registry();
$router = new Router($registry);

session_start();

include 'views/layout.php';

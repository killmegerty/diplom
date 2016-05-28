<?php
session_start();

require_once("config.php");
require_once("router.php");
require_once("registry.php");
require_once("controllers/Controller.php");
require_once("models/Model.php");

$registry = new Registry();
$router = new Router($registry);

include 'views/layout.php';


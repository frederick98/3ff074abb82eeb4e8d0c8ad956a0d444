<?php
require 'vendor/autoload.php';
use Dotenv\Dotenv;
use src\Main\DBConnect;

// load env
// $env = new Dotenv(__DIR__);
$env = Dotenv::createImmutable(__DIR__);
$env->load();

// check connection
$connect = (new DBConnect())->getConnection();

// test code
echo getenv('OKTAAUDIENCE');
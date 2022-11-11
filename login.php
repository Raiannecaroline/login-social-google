<?php

//AUTOLOAD COMPOSER
require __DIR__.'/vendor/autoload.php';

//DEPENDENCIAS
use Google\Client as GoogleClient;
use \App\Session\User;

//VALIDAÇÃO PRINCIPAL


//VERIFICA OS CAMPOS
if(!isset($_POST['credential']) || !isset($_POST['g_csrf_token'])){
    header('location: index.php');
    exit;
}

//COOKIE
$cookie = $_COOKIE['g_csrf_token'] ?? '';

//VERIFICANDO O VALOR DO COOKIE E DO POST
if($_POST['g_csrf_token'] != $cookie){
    header('location: index.php');
    exit;
}

//VALIDAÇÃO SECUNDARIA DO TOKEN

//INSTÂNCIA DO CLIENTE GOOGLE
$client = new GoogleClient(['client_id' => '228818343584-q9ov8pcoek3krvmjhhmh5ptlq09vonkv.apps.googleusercontent.com']);

//OBTEM OS DADOS DO USUÁRIO - JWT
$payload = $client->verifyIdToken($_POST['credential']);

//VERIFICA OS DADOS DO PAYLOAD
if (isset($payload['email'])) {
    SessionUser::login($payload['name'], $payload['email']);
    header('location: index.php');
    exit;
}

//PROBLEMAS AO CONSULTAR A API
die('Problemas ao consultar a API');

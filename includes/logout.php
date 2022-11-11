<?php

//AUTOLOAD COMPOSER
require __DIR__.'/vendor/autoload.php';

//DEPENDENCIAS
use App\Session\User as SessionUser;


//DESLOGAR
SessionUser::logout();

//REDIRECIONA O USUÁRIO PARA A PÁGINA HOME
header('location: index.php');
exit;
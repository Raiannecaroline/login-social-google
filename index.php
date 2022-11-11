<?php

//ATUTOLOAD DE CLASSES COMPOSER
require __DIR__.'/vendor/autoload.php';

//DEPENDÊNCIAS
use \App\Session\User as SessionUser;

//HEADER
include __DIR__.'/includes/header.php';

//LOGIN - CORPO
include SessionUser::isLogged() ?
    __DIR__.'/includes/admin.php' :
    __DIR__.'/includes/login.php';

//FOOTER
include __DIR__.'/includes/footer.php';
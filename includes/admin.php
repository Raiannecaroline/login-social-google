<?php

    //RETORNA AS INFORMAÇÕES DA SESSÃO DO USER
    $info = App\Session\User::getInfo();

?>



<h1>ADMIN - WDEV</h1>

<p>Olá, <b><?=$info['name']?></b>. Seja muito bem-vindo ao painel WDEV!</p>

<a href="logout.php">
    <button class="btn btn-danger">Sair</button>
</a>

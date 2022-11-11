<?php

namespace App\Session;

class User{

    /**
     * Método responsável por iniciar a sessão dentro da aplicação
     * @return boolean
     */
    private static function init(){
        return session_status() !== PHP_SESSION_ACTIVE ? session_start() : true;
    }

    /**
     * Método responsável por definir a sessão de login
     * @param string $name
     * @param string $email
     */
    public static function login($name, $email){
        //INICIA A SESSÃO DA APLICAÇÃO
        self::init();

        //DEFINE A SESSÃO DO USUÁRIO
        $_SESSION['user'] =[
            'name' => $name,
            'email' => $email
        ];
    }

    /**
     * Método responsável para verificar se o usuário está logado
     * @return boolean
     */
    public static function isLogged(){
        //INICIA A SESSÃO DA APLICAÇÃO
        self::init();

        //RETORNA A EXISTÊNCIA DO INDICE USER NA SESSÃO
        return isset($_SESSION['user']);

    }

    /**
     * Método responsável por retornar as informações guardadas na sessão do usuário
     * @return array
     */
    public static function getInfo(){
        //INICIA A SESSÃO DA APLICAÇÃO
        self::init();

        //RETORNA OS DADOS DA SESSÃO
        return $_SESSION['user'] ?? [];
    }

    /**
     * Método responsável para deslogar o usuário
     */
    public static function logout(){
        //INICIA A SESSÃO DA APLICAÇÃO
        self::init();

        //REMOVE A SESSÃO DO USUÁRIO
        unset($_SESSION['user']);
    }

}
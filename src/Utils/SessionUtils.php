<?php

namespace App\Utils;

use RuntimeException;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\Handler\PdoSessionHandler;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;

class SessionUtils
{
    public static function startSession(): Session
    {
//        $sessionStorage = new NativeSessionStorage(['cookie_lifetime' => 1e10], new PdoSessionHandler());
//        $session = new Session($sessionStorage);
        $session = new Session();
        try{
            if(!$session->isStarted()) $session->start();
            //echo 'session_started';
        }catch(RuntimeException $exception){}
        //setcookie('PHPSESSID', $session->getId(), time() + 5*60, '/', '.vzglyad-24.ru');
        //if(!isset($_COOKIE['test'])) setcookie('test', md5(rand(0, 1e7)));
        $session->migrate();
        return $session;
    }

}


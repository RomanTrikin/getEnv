<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace roman\Env;
use Dotenv\Dotenv;
require 'vendor/autoload.php';
/**
 * Description of myEnv
 *
 * @author roman
 */
class myEnv {
    
    
    public function __construct()
    {

    }

    public static function get($env_name)
    {
        $filelist = glob("{,.}*env", GLOB_BRACE);
        $path = $_SERVER['DOCUMENT_ROOT'];
        foreach ($filelist as $value) {
            echo $value; echo "\n";
            $dotenv = Dotenv::createImmutable($path, $value);
            $dotenv->load();
        }
        return $_ENV[$env_name];
    }
}

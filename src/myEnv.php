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
    
    private $filelist;
    
    private $ENV;
    
    private $path;
    
    public function __construct()
    {
        $this->filelist = glob("*.env");
        $this-> path = $_SERVER['DOCUMENT_ROOT'];
        foreach ($this->filelist as $value) {
            $dotenv = Dotenv::createImmutable($this-> path, $value);
            $dotenv->load();
        }
        $this->ENV = $_ENV;
    }

    public function get($env_name)
    {
        return $this->ENV[$env_name];
    }
}
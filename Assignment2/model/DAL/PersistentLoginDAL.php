<?php

namespace model;

//Class for saving cookies on file
class PersistentLoginDAL
{
    private static $persistentLoginFile = "persistentLogin.txt";

    public function save($token){
        $handleFile = fopen(self::$persistentLoginFile, 'w') or die('ERROR');
        fwrite($handleFile, $token);
        fclose($handleFile);
    }

    public function load(){
        $handleFile = fopen(self::$persistentLoginFile, 'r');
        $token = fread($handleFile, filesize(self::$persistentLoginFile));
        fclose($handleFile);
        return $token;
    }
}
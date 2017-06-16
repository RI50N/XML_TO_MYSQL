<?php
define('HOME', 'http://localhost/Projeto-integrador-4/NM/');

//Session
session_start();

// CONFIGRAÇÕES DO SITE ####################
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBSA', 'nfse_bd');

// AUTO LOAD DE CLASSES ####################
function __autoload($Class) {

    $cDir = ['Conn'];
    $iDir = null;

    foreach ($cDir as $dirName):
        if (!$iDir && file_exists(__DIR__ . "/{$dirName}/{$Class}.class.php") && !is_dir(__DIR__ . "/{$dirName}/{$Class}.class.php")):
            include_once (__DIR__ . "/{$dirName}/{$Class}.class.php");
            $iDir = true;
        endif;
    endforeach;

    if (!$iDir):
        trigger_error("Não foi possível incluir {$Class}.class.php", E_USER_ERROR);
        die;
    endif;
}

<?php

spl_autoload_register(function ($className) {
    $path = "./classes/";
    $ext = ".class.php";
    $filename = $path . $className . $ext;

    if(!file_exists($filename)) {
        return false;
    }

    include $filename;
});
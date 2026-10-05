<?php
spl_autoload_register(function ($namacontroller) {
    $paths = ['controller/', 'model/', 'config/', 'core/'];

    foreach ($paths as $path) {
        $file = $path . $namacontroller . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
    echo "Class '$namacontroller' tidak ditemukan.";
});
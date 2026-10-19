<?php
function base_url($path = '')
{
    global $config;
    
    // FIX BIAR GAK NULL LAGI
    if (!isset($config) || !isset($config['base_url']) || $config['base_url'] == null) {
        $config['base_url'] = 'http://localhost/dpwl-Khairaany075/';
    }
    
    return rtrim($config['base_url'], '/') . '/' . ltrim($path, '/');
}

function redirect($path)
{
    header('Location: ' . base_url('?url=' . ltrim($path, '/')));
    exit;
}
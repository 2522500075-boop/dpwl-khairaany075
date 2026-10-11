<?php
function base_url($path = '')
{
    global $config;
    return rtrim($config['base_url'], '/') . '/' . ltrim($path, '/');
}
function redirect($path)
{
    header('Location: ' . base_url('?url=' . ltrim($path, '/')));
    exit;
}
<?php
class Session
{
    public function __construct()
    {
        session_start();
    }

    public function set_userdata($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function userdata($key)
    {
        return $_SESSION[$key] ?? null;
    }

    public function unset_userdata($key)
    {
        unset($_SESSION[$key]);
    }

    public function set_flashdata($key, $value = null)
    {
        if ($value != null) {
            $_SESSION['flash'][$key] = $value;
        } else {
            $data = $_SESSION['flash'][$key] ?? null;
            unset($_SESSION['flash'][$key]);
            return $data;
        }
    }
}
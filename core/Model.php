<?php
class Model
{
    protected $db;
    public function __construct()
    {
        require_once __DIR__ . '/../config/database.php';
        $this->db = new mysqli(
            $dbhost,
            $dbuser,
            $dbpass,
            $dbname,
            $dbport
        );
        if ($this->db->connect_error) {
            die('Koneksi database gagal: ' . $this->db->connect_error);
        }
        $this->db->set_charset('utf8mb4');
    }
}
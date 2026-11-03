<?php
class Controller
{
    public $load;
    public $session;

    public function __construct()
    {
        $this->session = new Session();

        $this->load = new class {
            public function view($viewName, $data = [])
            {
                if (!empty($data)) {
                    extract($data);
                }
                
                $file = __DIR__ . '/../view/' . $viewName . '.php';
                if(!file_exists($file)){
                    die("FILE VIEW TIDAK DITEMUKAN: " . $file . " <br> Cek lagi nama file di folder view/v_master/");
                }
                require $file;
            }

            public function model($modelName)
            {
                require_once __DIR__ . '/../model/' . $modelName . '.php';
                $modelName = basename($modelName);
                return new $modelName();
            }

            public function post($key = null) { return $key === null ? $_POST : ($_POST[$key] ?? null); }
            public function get($key = null) { return $key === null ? $_GET : ($_GET[$key] ?? null); }
        };
    }

    public function view($viewName, $data = [])
    {
        $this->load->view($viewName, $data);
    }

    public function model($modelName)
    {
        return $this->load->model($modelName);
    }
}
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
                if (!empty($data)) extract($data);
                require __DIR__ . '/../view/'. $viewName. '.php';
            }
            public function model($modelName)
            {
                require_once __DIR__ . '/../model/'. $modelName. '.php';
                $modelName = basename($modelName);
                return new $modelName();
            }
            public function post($key = null)
            {
               if ($key === null) {
               return $_POST;
               }
               return $_POST[$key] ?? null;
            }
            public function get($key = null)
           {
                if ($key === null) {
                return $_GET;
                }
                return $_GET[$key] ?? null;
            }
        };
    }
}
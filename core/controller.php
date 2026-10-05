<?php
class Controller
{
    public function __construct()
    {
        $this->load->view = new class {
            public function view($viewName, $data = [])
            {
                if (!empty($data)) extract($data);
                require './view/'. $viewName. '.php';
            }
            public function model($modelName)
            {
                require_once './model/'. $modelName. '.php';
                return new $modelName();
            }
        };
    }
}
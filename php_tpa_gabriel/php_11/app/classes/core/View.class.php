<?php

namespace App\Classes\Core;

class View
{
    private $DEFAULT_DIRECTORY = "pages/";
    private $DEFAULT_EXTENSION = ".view.php";

    protected $name = "";
    protected $path = "";
    protected $data = [];

    // quiz.response
    public function __construct($path, array $data = [])
    {
        [$this->name] = array_reverse(explode(".", $path));

        $this->path = array_filter(explode(".", $path), fn ($value) => ($value != $this->name));
        $this->path = implode('/', $this->path) . "/";

        $this->data = $data;

        return $this;
    }

    public static function view($path, array $data = [])
    {
        $view = new Self($path, $data);

        return $view;
    }

    public function render()
    {
        foreach ($this->data as $name => $value) {
            global $$name;
            $$name = $value;
        }
        try {
            require_once $this->DEFAULT_DIRECTORY . $this->path . $this->name . $this->DEFAULT_EXTENSION;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

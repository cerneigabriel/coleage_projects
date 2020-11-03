<?php

class View
{
    protected $view;
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
        $this->view = VIEWS_PATH . $this->path . $this->name . VIEW_EXTENTION;

        if (!file_exists($this->view)) throw new \Exception("View \"$this->view\" not found");

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
            require $this->view;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

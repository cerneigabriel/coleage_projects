<?php

class EleviController
{
    public function index(array $request)
    {
        $elevi = new Elev;

        $orderBy = isset($request["orderBy"]) ? $request["orderBy"] : false;
        $direction = isset($request["direction"]) && $orderBy != "" && $request["direction"] != "NONE" ? $request["direction"] : false;

        if (!!$direction) $elevi = $elevi->orderBy($orderBy, $direction);

        $filters = isset($request["filters"]) ? $request["filters"] : [];

        foreach ($filters as $property => $filter_options) {
            foreach ($filter_options as $filter => $option) {
                if ($option === "") break;

                if ($filter === "min") $elevi = $elevi->where($property, ">", $option);
                elseif ($filter === "max") $elevi = $elevi->where($property, "<", $option);
                elseif ($filter === "maxAge") {
                    $elevi = $elevi->where($property, ">=", "'" . date("Y-m-d", strtotime("-$option years")) . "'");
                } else $elevi = $elevi->whereOr($property, "LIKE", "'%$option%'");
            }
        }

        return View::view("pages.elevi.index", [
            "title" => "Elevi",
            "fields" => $elevi->fields,
            "elevi" => $elevi->get(),
            "eleviAll" => Elev::get()
        ])->render();
    }
}

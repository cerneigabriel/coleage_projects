<?php

class Elev extends Model
{
    protected $table = "elevi";
    protected $primaryKey = "id";
    public $fillable = [
        "nume",
        "prenume",
        "adresa",
        "email",
        "data_nasterii",
        "sex",
        "media_bac"
    ];

    public $fields = [
        "id" => [
            "title" => "ID",
            "sortable" => true,
            "filterable" => false
        ],
        "nume" => [
            "title" => "Nume",
            "sortable" => true,
            "filterable" => true,
        ],
        "prenume" => [
            "title" => "Prenume",
            "sortable" => true,
            "filterable" => true,
        ],
        "adresa" => [
            "title" => "Adresa",
            "sortable" => true,
            "filterable" => true,
        ],
        "email" => [
            "title" => "Email",
            "sortable" => true,
            "filterable" => true,
        ],
        "data_nasterii" => [
            "title" => "Data Nasterii",
            "sortable" => true,
            "filterable" => true,
            "filters" => [
                "maxAge"
            ]
        ],
        "sex" => [
            "title" => "Sex",
            "sortable" => true,
            "filterable" => true,
        ],
        "media_bac" => [
            "title" => "Media Bac",
            "sortable" => true,
            "filterable" => true,
            "filters" => [
                "min",
                "max"
            ]
        ],
    ];

    protected $casts = [
        "id" => "integer",
        "nume" => "string",
        "prenume" => "string",
        "adresa" => "string",
        "email" => "string",
        "data_nasterii" => "date",
        "sex" => "string",
        "media_bac" => "float"
    ];



    public $date_format = "Y-m-d";

    public function fields()
    {
        return [$this->primaryKey, ...$this->fillable];
    }
}

<?php

namespace App\Classes\Models;

use App\Classes\Core\Model;

class QuestionType extends Model
{
    protected $table = "q_question_types";
    protected $primaryKey = "id";
    protected $fillable = [
        "name"
    ];

    protected $types = [
        "name" => "string"
    ];
}

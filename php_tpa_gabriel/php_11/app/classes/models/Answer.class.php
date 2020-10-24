<?php

namespace App\Classes\Models;

use App\Classes\Core\Model;

class Answer extends Model
{
    protected $table = "q_answers";
    protected $primaryKey = "id";
    protected $fillable = [
        "q_question_id",
        "answer",
        "is_correct"
    ];

    protected $types = [
        "q_question_id" => "integer",
        "answer" => "string",
        "is_correct" => "bool"
    ];
}

<?php

namespace App\Classes\Models;

use App\Classes\Core\Model;
use App\Classes\Models\QuestionType;
use App\Classes\Models\Answer;

class Question extends Model
{
    protected $table = "q_questions";
    protected $primaryKey = "id";
    protected $fillable = [
        "q_question_type_id",
        "question"
    ];

    protected $types = [
        "q_question_type_id" => "integer",
        "question" => "string"
    ];

    public function type()
    {
        return $this->query()->instanceOf(QuestionType::class)->where("id", "=", $this->q_question_type_id)->first();
    }

    public function answers()
    {
        return $this->query()->instanceOf(Answer::class)->where("q_question_id", "=", $this->id)->get();
    }

    public function correctAnswers()
    {
        return $this->query()->instanceOf(Answer::class)->where("q_question_id", "=", $this->id)->where("is_correct", "=", 1)->get();
    }
}

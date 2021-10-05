<?php

namespace App\Abstracts;

use App\Interfaces\QuestionsInterface as QuestionsInterface;
use App\Interfaces\QuestionInterface;

abstract class Questions implements QuestionsInterface{


    /** @var array $questions */
    private $questions = [];

    /**
     * @return array
     */
    public function questions(){
        return $this->questions;
    }

    /**
     * @param QuestionInterface $question
     */
    public function addQuestion(QuestionInterface $question){
        $this->questions[]=$question;
    }

    /**
     * @param QuestionInterface $question
     * @return array
     */
    public function removeQuestion(QuestionInterface $question){

        return array_filter($this->questions, function($value) use($question) {
            return $question->getId() !== $value->getId();
        });
    }

}
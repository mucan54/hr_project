<?php

namespace App\Interfaces;

interface QuestionsInterface{

    public function questions();
    public function addQuestion(QuestionInterface $question);
    public function removeQuestion(QuestionInterface $question);

}
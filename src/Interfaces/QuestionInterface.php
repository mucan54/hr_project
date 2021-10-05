<?php

namespace App\Interfaces;

interface QuestionInterface{

    public function answer($answer);
    public function getQuestion();
    public function setQuestion($question);
    public function answerType():string;
    public function questionEngine();
    public function getId();
    public function setId($id);

}
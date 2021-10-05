<?php

namespace App\Classes;

use App\Interfaces\QuestionInterface;
use App\Abstracts\Question;

class TextQuestion extends Question{


    public function answer($answer)
    {
        if(!is_string($answer))
            throw new \Exception('Text question type gets only text type answer.');

        $this->setAnswer($answer);

        return $this;
    }


    public function answerType() :string
    {
        return 'text';
    }

    public function questionEngine()
    {
        // TODO: Implement questionEngine() method.
    }
}
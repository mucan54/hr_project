<?php

namespace App\Classes;

use App\Interfaces\QuestionInterface;
use App\Abstracts\Question;
use App\Traits\DependentQuestion;

class BoolQuestion extends Question {

    use DependentQuestion;

    /**
     * @param $answer
     * @return $this
     * @throws \Exception
     */
    public function answer($answer)
    {
        if(!is_bool($answer))
            throw new \Exception('Boolean question type gets only boolean type answer.');

       $this->setAnswer($answer);
       $this->dependencyChecker($answer);

       return $this;
    }


    /**
     * @return string
     */
    public function answerType() :string
    {
        return 'bool';
    }

    public function isDependent()
    {
        return true;
    }

    public function questionEngine()
    {
        // TODO: Implement questionEngine() method.
    }

}
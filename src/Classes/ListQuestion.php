<?php

namespace App\Classes;

use App\Abstracts\Question;

class ListQuestion extends Question{

    private $answerList=[];


    public function answer($answer)
    {
        if(!is_int($answer))
            throw new \Exception('List question type gets only integer type answer.');

        if($this->getAnswerNums()<=$answer)
            throw new \Exception('Your answer is out of list range.');

        $this->setAnswer($this->answerList[$answer]);

        return $this;
    }

    public function answerType(): string
    {
        return 'int';
    }

    public function questionEngine()
    {
        // TODO: Implement questionEngine() method.
    }

    /**
     * @return int
     */
    public function getAnswerNums()
    {
        return count($this->answerList);
    }


    /**
     * @return mixed
     */
    public function getAnswerList()
    {
        return $this->answerList;
    }

    /**
     * @param mixed $answerList
     */
    public function setAnswerList($answerList): void
    {
        $this->answerList = $answerList;
    }

    public function addAnswer($answer)
    {
        $this->answerList[] = $answer;
    }
}

<?php

namespace App\Classes;

use App\Abstracts\Question;
use App\Interfaces\QuestionInterface;
use App\Interfaces\QuestionsInterface;
use App\Traits\DependentQuestion;

class Questionery{

    /**
     * @var $id
     */
    private $id;

    /**
     * @var int
     */
    private $questionsNum;

    /**
     * @var int
     */
    private $currentQuestion=0;

    /**
     * @var QuestionsInterface $questions
     */
    private $questions;

    /**
     * Questionery constructor.
     * @param QuestionsInterface $questions
     */
    public function __construct(QuestionsInterface $questions){
        $this->questions = $questions;
        $this->questionsNum = count($this->questions->questions());
    }

    /**
     * @return QuestionInterface|false|mixed
     */
    public function askMe(){
        $next=false;
        if($this->currentQuestion<$this->questionsNum){
            /** @var Question $question */
            $question = $this->questions->questions()[$this->currentQuestion];
            $next = $question;

            if(!$question->isDependent()){

                $this->currentQuestion = $this->currentQuestion+1;
            }else if($question->answered){

                /** @var DependentQuestion $question */
                if ($question->isDependencyCheck()) {
                    $this->currentQuestion = $this->currentQuestion + 1;
                    $next = $question->dependents;
                } else {
                    if ($this->currentQuestion + 1 < $this->questionsNum)
                        $next = $this->questions->questions()[$this->currentQuestion + 1];
                    $this->currentQuestion = $this->currentQuestion + 2;
                }
            }

        }
        return $next;
    }

}

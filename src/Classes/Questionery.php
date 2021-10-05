<?php

namespace App\Classes;

use App\Interfaces\QuestionInterface;
use App\Interfaces\QuestionsInterface;

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
            /** @var QuestionInterface $question */
            $question = $this->questions->questions()[$this->currentQuestion];

            if ($question->isDependent() && $question->hasDependency && !$question->answered){

                $next = $question;

            }else if($question->isDependent() && $question->isDependencyCheck()){

                $this->currentQuestion = $this->currentQuestion+1;
                $question->setIsDependencyCheck(false);
                $next = $question->dependents;

            } else if($question->isDependent() && $question->answered){

                if($this->currentQuestion+1<$this->questionsNum)
                    $next = $this->questions->questions()[$this->currentQuestion+1];

                $this->currentQuestion = $this->currentQuestion+2;
            }
            else{
                $this->currentQuestion = $this->currentQuestion+1;
                $next = $question;
            }
        }
        return $next;
    }

}

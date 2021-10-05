<?php

namespace App\Abstracts;

use App\Interfaces\QuestionInterface;

abstract class Question implements QuestionInterface{

    /**
     * @var $id
     */
    private $id;

    /**
     * @var $name
     */
    private $name;

    /**
     * @var $question
     */
    private $question;

    /**
     * @var bool
     */
    public $answered = false;

    /** @var string $answer */
    private $answer;

    /**
     * @param $answer
     */
    public function setAnswer($answer){

        $this->answered=true;
        $this->answer=$answer;
    }

    /**
     * @return string
     */
    public function getAnswer(){

        return $this->answer;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function isDependent(){
        return false;
    }
}

<?php

namespace App\Traits;

use App\Interfaces\QuestionInterface;

trait DependentQuestion{

    /** @var bool $dependencyCheck */
    private $dependencyCheck = false;

    /** @var bool  */
    public $hasDependency =false;

    /** @var mixed  */
    private $dependencyRule;

    /** @var QuestionInterface $dependents */
    public $dependents;


    /**
     * @return QuestionInterface
     */
    public function getDependents() : QuestionInterface
    {
        return $this->dependents;
    }

    /**
     * @param mixed $dependents
     */
    public function setDependents(QuestionInterface $dependents)
    {
        $this->hasDependency = true;
        $this->dependents = $dependents;
    }

    /**
     * @return mixed
     */
    public function getDependencyRule()
    {
        return $this->dependencyRule;
    }

    /**
     * @param mixed $dependencyRule
     */
    public function setDependencyRule($dependencyRule)
    {
        $this->dependencyRule = $dependencyRule;
    }

    /**
     * @return bool
     */
    public function isDependencyCheck()
    {
        return $this->dependencyCheck;
    }

    /**
     * @return bool
     */
    public function setIsDependencyCheck($check)
    {
        $this->dependencyCheck=$check;
    }

    public function dependencyChecker($answer){
        if($answer == $this->dependencyRule)
            $this->dependencyCheck = true;
    }

}

<?php


namespace App\Classes;

require '../../vendor/autoload.php';

use App\Classes\BoolQuestion;
use App\Classes\TextQuestion;
use App\Classes\Questionery;
use App\Classes\Questions;
use App\Classes\ListQuestion;

new Main();

class Main
{

    public function __construct(){
        $this->app();
    }

    public function app(){

        $listQuestion = new ListQuestion();
        $listQuestion->addAnswer("Yes");
        $listQuestion->addAnswer("No");
        $listQuestion->addAnswer("I have no idea.");
        $listQuestion->setQuestion("Do you agree?");

        $boolQuestion = new BoolQuestion();
        $boolQuestion->setQuestion("Is it True");

        $dependentQuestion = new TextQuestion();
        $dependentQuestion->setQuestion("It is dependent question");

        $boolQuestion->setDependents($dependentQuestion);
        $boolQuestion->setDependencyRule(true);

        $textQuestion = new TextQuestion();
        $textQuestion->setQuestion("Text Question");

        $questions = new Questions();
        $questions->addQuestion($listQuestion);
        $questions->addQuestion($boolQuestion);
        $questions->addQuestion($textQuestion);

        $questionnaire = new Questionery($questions);


        try {
            if ($answer = $questionnaire->askMe())
                echo $this->writeAnswer($answer->answer(0));
            if ($answer = $questionnaire->askMe())
                echo $this->writeAnswer($answer->answer(true));
            if ($answer = $questionnaire->askMe())
                echo $this->writeAnswer($answer->answer("12312"));
            if ($answer = $questionnaire->askMe())
                echo $this->writeAnswer($answer->answer("test"));
        }
        catch (\Exception $e) {
            echo $e->getMessage();
        }

    }

    public function writeAnswer($answer)
    {
        return "Question:" . $answer->getQuestion() . PHP_EOL . "Answer:" . $answer->getAnswer() . PHP_EOL . PHP_EOL;
    }
}
<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\Test;
use Livewire\Component;

class Questions extends Component
{

    public
        $questions = true,
        $inclinationsTest = false,
        $charactersTest = false,
        $skillsTest = false,
        $charactersQuestion = false,
        $inclinationsQuestion = false,
        $startSkillsQuestion = false,
        $charactersreport = false,
        $inclinationsreport = false,
        $startSkillsreport = false,
        $data,
        $counter = 0,
        $reportest = true

    ;

    public function render()
    {
        return view('livewire.questions',[
            'questions',
            'inclinationsTest',
            'charactersTest',
            'skillsTest',            
            'inclinationsreport',
            'charactersreport',
            'startSkillsreport'
        ]);
    }
  
    public function startCharactersTest()
    {
        $this->charactersTest = true;
        $this->inclinationsTest = false;
        $this->skillsTest = false;
        $this->questions = false;
    }

    public function startInclinationsTest()
    {
        $this->inclinationsTest = true;
        $this->charactersTest = false;
        $this->skillsTest = false;
        $this->questions = false;
    }

    public function startSkillsTest()
    {
        $this->skillsTest = true;
        $this->charactersTest = false;
        $this->inclinationsTest = false;
        $this->questions = false;
    }

    public function startCharactersQuestion()
    {
        $this->charactersQuestion = true;
        $this->charactersTest = false;
        $this->skillsTest = false;
        $this->inclinationsTest = false;
        $this->questions = false;

        $this->data = Test::with('questions')->where('pattern', 'characters')->get();

    }

    public function startInclinationsQuestion()
    {
        $this->inclinationsQuestion = true;
        $this->charactersTest = false;
        $this->skillsTest = false;
        $this->inclinationsTest = false;
        $this->questions = false;

        $this->data = Test::with('questions')->where('pattern', 'inclinations')->get();

    }

    public function startSkillsQuestion()
    {
        $this->startSkillsQuestion = true;
        $this->charactersTest = false;
        $this->skillsTest = false;
        $this->inclinationsTest = false;
        $this->questions = false;

        $this->data = Test::with('questions')->where('pattern', 'skills')->get();

    }

    public function nextQuestion()
    {

        if( $this->counter ==  $this->data->count()){
            if( $this->inclinationsQuestion == true ){
                $this->inclinationsreport = true;
                $this->inclinationsQuestion = false;
            }elseif( $this->charactersQuestion  == true){
                $this->charactersreport = true;
                $this->charactersQuestion = false;
            }elseif( $this->startSkillsQuestion  == true){
                $this->startSkillsreport = true;
                $this->startSkillsQuestion = false;
            }
        }else{
            $this->counter ++;
        }
    }

    public function backQuestion()
    {
        $this->counter --;
    }

}

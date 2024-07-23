<?php

namespace App\Livewire;

use Livewire\Component;

class Calculator extends Component
{
    public $firstNumber = 0;
    public $secondNumber = 0;
    public string $operator = '+';
    public float $result = 0;
    public bool $disabled = false;
    public function render()
    {
        return view('livewire.calculator')
            ->layout('layouts.app');
    }

    public function calculate()
    {
        $num1 = (float) $this->firstNumber;
        $num2 = (float) $this->secondNumber;

        switch ($this->operator) {
            case '+':
                $this->result = $num1 + $num2;
                break;
            case '-':
                $this->result = $num1 - $num2;
                break;
            case '*':
                $this->result = $num1 * $num2;
                break;
            case '/':
                $this->result = $num1 / $num2;
                break;
            case '%':
                $this->result = $num1 % $num2;
                break;
        }
    }

    public function updated($property)
    {
        if($this->firstNumber == '' || $this->secondNumber == '0'){
            $this->disabled = true;
    }else{
        $this->disabled = false;
    }
    }
}

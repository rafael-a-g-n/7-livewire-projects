<?php

namespace App\Livewire;

use Livewire\Component;

class Calculator extends Component
{
    public $firstNumber = '';
    public $secondNumber = '';
    public string $operator = '+';
    public float $result;
    public bool $disabled = true;
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

        $this->firstNumber = '';
        $this->secondNumber = '';
    }

    public function updated($property)
    {
        if($this->firstNumber === '' || $this->secondNumber === ''){
            $this->disabled = true;
    }else{
        $this->disabled = false;
    }
    }
}

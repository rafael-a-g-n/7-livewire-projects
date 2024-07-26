<?php
namespace App\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class RegisterForm extends Component
{
    public string $email = '';
    public string $password = '';
    public string $first_name = '';
    public string $last_name = '';
    public string $role = 'customer';
    public string $company_name = '';
    public string $vat_number = '';
    public bool $disabled = true;

    protected $rules = [
        'first_name' => ['required', 'min:2'],
        'last_name' => ['required', 'min:2'],
        'email' => ['required', 'email'],
        'password' => ['required', 'min:8'],
        'role' => ['required', 'in:customer,vendor'],
        'company_name' => ['required_if:role,vendor'],
        'vat_number' => ['required_if:role,vendor'],
    ];

    public function render()
    {
        return view('livewire.register-form')->layout('layouts.app');
    }

    public function submit()
    {
        $this->validate();
        // Register customer
        session()->flash('message', 'Customer was created.');
        $this->resetForm();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->checkFormValidity();
    }

    private function resetForm()
    {
        $this->email = '';
        $this->password = '';
        $this->first_name = '';
        $this->last_name = '';
        $this->role = 'customer';
        $this->company_name = '';
        $this->vat_number = '';
        $this->disabled = true;
    }

    private function checkFormValidity()
    {
        $data = [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role,
        ];

        $rules = [
            'first_name' => $this->rules['first_name'],
            'last_name' => $this->rules['last_name'],
            'email' => $this->rules['email'],
            'password' => $this->rules['password'],
            'role' => $this->rules['role'],
        ];

        if ($this->role === 'vendor') {
            $data['company_name'] = $this->company_name;
            $data['vat_number'] = $this->vat_number;
            $rules['company_name'] = $this->rules['company_name'];
            $rules['vat_number'] = $this->rules['vat_number'];
        }

        $validator = Validator::make($data, $rules);

        $this->disabled = $validator->fails();
    }
}

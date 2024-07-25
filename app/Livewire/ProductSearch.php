<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Product;
use Livewire\WithPagination;

class ProductSearch extends Component
{
    use WithPagination;


    public string $search = '';
    public string $sortField = 'id';
    public string $sortDirection = 'asc';
    protected $queryString = ['search', 'sortField', 'sortDirection'];

    public function render()
    {
        $query = Product::query();
        if ($this->search) {
            $query->where('title', 'like', "%{$this->search}%")
                ->orWhere('description', 'like', "%{$this->search}%");
        }

        $query->orderBy($this->sortField, $this->sortDirection);

        return view('livewire.product-search', [
            'products' => $query->paginate(20)
        ])->layout('layouts.app');
    }

    public function toggleSort($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
        $this->resetPage();
    }

    public function updated($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }
}

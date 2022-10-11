<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ExampleComponent extends Component
{
    use WithPagination;
    /* public $products;

    public function mount()
    {
        $this->products = Product::paginate(5);
    } */

    public function render()
    {
        return view('livewire.admin.example-component',
            ['products' => Product::paginate(1)
        ]);
    }
}

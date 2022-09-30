<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Product;
use Livewire\Component;

class MyPost extends Component
{
    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::where('user_id', auth()->user()->id)->paginate(2); 

        $user = User::find(auth()->user()->id);

        return view('livewire.admin.my-post', compact('products','user'))->layout('layouts.admin');
    }
}
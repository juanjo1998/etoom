<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;

class MyPost extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $this->authorize('clientStatus',User::class);

        $products = Product::where('user_id', auth()->user()->id)
                            ->paginate(2); 

        $user = User::find(auth()->user()->id);

        return view('livewire.admin.my-post', compact('products','user'))->layout('layouts.admin');
    }
}
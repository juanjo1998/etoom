<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use App\Models\User;
use App\Models\Product;


use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class ShowProducts extends Component
{
    use WithPagination;

    public $search;
    public $products = [];
    public $product;
    
    
    public $users = [];
    public $user_type = "";
    public $user_filter = "";

    /* state */

    public $states = [];
    public $state_id = "";

    protected $listeners = ['render'];

    public function mount()
    {
        $this->products = Product::all();

        /* tipos de usuarios */
        $this->users_type = [1,2];
    }

    public function updatedUserType($value)
    {
        $this->users = User::where('client_status','=',$value)
                            ->where('email','!=','etoomonline@gmail.com')                                  
                            ->get();

        $this->products = Product::whereHas('user',function(Builder $query) use ($value){
            $query->where('client_status',$value);
        })->get();
    }

    public function updatedUserFilter($value)
    {
        $this->products = Product::where('user_id',$value)->get();

        $this->states = Department::all();
    }

    public function updatedStateId()
    {
        $this->products = Product::where('user_id',$this->user_filter)
                ->where('department_id',$this->state_id)
                ->get();
    }

    public function deleteFilter()
    {
        $this->products = Product::all();
        $this->users = [];
        $this->states = [];
        $this->reset(['user_filter','user_type','state_id']);
    }

    public function updatingSearch(){
        /* $this->products = Product::where('name', 'like', '%' . $this->search . '%')->paginate(10); */
        $this->resetPage();
    }

    public function productsDraft()
    {
        if ($this->user_filter != "") {
            $products = $this->products;

            foreach ($products as $product ) {
                $product->status = 1;
                $product->save();
            }

            $this->products->fresh();
        }
    }

    public function productsPublished()
    {
        if ($this->user_filter != "") {
            $products = $this->products;

            foreach ($products as $product ) {
                $product->status = 2;
                $product->save();
            }

            $this->products->fresh();
        }
    }

    public function publishedStatus($product)
    {
        $this->product = Product::find($product);
        $this->product->status = 2;
        $this->product->save();

        $this->emitSelf('render');
    }

    public function draftStatus($product)
    {
        $this->product = Product::find($product);
        $this->product->status = 1;
        $this->product->save();

        $this->emitSelf('render');

    }

    public function render()
    {
        return view('livewire.admin.show-products')->layout('layouts.admin');
    }
}
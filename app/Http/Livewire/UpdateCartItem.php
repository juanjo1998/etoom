<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Gloudemans\Shoppingcart\Facades\Cart;

class UpdateCartItem extends Component
{

    public $rowId;

    

    public function decrement(){
       

        Cart::update($this->rowId);

        $this->emit('render');
    }

    public function increment(){
        

        Cart::update($this->rowId);

        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.update-cart-item');
    }
}

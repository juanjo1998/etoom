<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;
    
    public function published(User $user,Product $product)
    {
        if ($user->id == $product->user_id) {
            return true;            
        }else{
            return false;
        }
    }
}

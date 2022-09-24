<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    /* relacion uno a uno  */

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}

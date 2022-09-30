<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    public function show(Product $product){
        if ($product->status == 1) {          
            $this->authorize('published',$product);
        }

        return view('products.show', compact('product'));
    }
}

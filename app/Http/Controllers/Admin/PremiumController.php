<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PremiumImage;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PremiumController extends Controller
{

    public function index()
    {   

        $this->authorize('premium',User::class);

        $user = User::find(auth()->user()->id);

        $premiumImages = PremiumImage::where('user_id',$user->id)->get();  
        
        $product = null;

        if (isset($user->premiumImage->product_id)) {
            $product = Product::find($user->premiumImage->product_id);
        }

        return view('admin.premium.index',compact('premiumImages','product'));
    }


    public function create()
    {
        $this->authorize('premium',User::class);

        $products = Product::where('user_id',auth()->user()->id)->get();
        
        return view('admin.premium.create',compact('products'));
    }

    public function edit($premiumImage)
    {
        $this->authorize('premium',User::class);

        $products = Product::where('user_id',auth()->user()->id)->get();
        $premiumImage = PremiumImage::find($premiumImage);

        return view('admin.premium.edit',compact('products','premiumImage'));
    }

    public function store(Request $request)
    {
        $this->authorize('premium',User::class);

        $request->validate([
            'file' => 'required|image|max:2048',
            'product_id' => 'required',            
        ]);
            
        //$url = Storage::url($request->file('file')->store('premium'));
        $url = $request->file('file')->store('premium');
        $product = Product::find($request->get('product_id'));

        if (auth()->user()->premiumImage) {
            return redirect()->route('admin.premium.create')->with('message','this user already has an image in the slider');
        }else{
            PremiumImage::create([
                'url' => $url,
                'route' => url('/products/'.$product->slug),
                'user_id' => auth()->user()->id,
                'product_id' => $product->id
            ]);

            return redirect()->route('admin.premium.index');
        }

    }

    public function update(Request $request,PremiumImage $premiumImage)
    {
       $this->authorize('premium',User::class);

       $premiumImage->update($request->all());

       if ($request->file('file')) {
            $url = Storage::put('premium',$request->file('file'));    
            $product = Product::find($request->get('product_id'));   

            Storage::delete($premiumImage->url);

            $premiumImage->update([
                'url' => $url,
                'route' => url('/products/'.$product->slug),
                'product_id' => $request->get('product_id'),
                'user_id' => auth()->user()->id
            ]);
       }

       return redirect()->route('admin.premium.index');
    }

    public function delete(PremiumImage $premiumImage)
    {
        $this->authorize('premium',User::class);
        
        Storage::delete($premiumImage->url);

        $premiumImage->delete();

        return back();
    }
}

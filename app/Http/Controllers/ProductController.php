<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function showAllProducts()
    {
        $product = Product::all();

        if (Auth::id())
        {
            $id = Auth::user()->id;

            $cart = Cart::where('user_id', '=', $id)->get();

            $cartCount = $cart->count();

            return view('product.body', compact('product', 'cartCount'));
        }
        else
        {
            return view('product.body', compact('product'));
        }
    }

    public function search_product(Request $request)
    {
        $search_text = $request->search;

        $product = Product::where('title', 'LIKE', "%$search_text%")->orWhere('category', 'LIKE', "%$search_text%")->get();

        return view('product.body', compact('product'));
    }
}

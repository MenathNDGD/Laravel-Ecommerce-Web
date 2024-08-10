<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function showBlogPage()
    {
        if (Auth::id())
        {
            $id = Auth::user()->id;

            $cart = Cart::where('user_id', '=', $id)->get();

            $cartCount = $cart->count();

            return view('blog.body', compact('cartCount'));
        }
        else
        {
            return view('blog.body');
        }
    }
}

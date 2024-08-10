<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function showAboutPage()
    {
        if (Auth::id())
        {
            $id = Auth::user()->id;

            $cart = Cart::where('user_id', '=', $id)->get();

            $cartCount = $cart->count();

            return view('about.body', compact('cartCount'));
        }
        else
        {
            return view('about.body');
        }
    }
}

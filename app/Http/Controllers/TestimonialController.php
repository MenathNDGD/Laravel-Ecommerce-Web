<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    public function showTestimonialPage()
    {
        if (Auth::id())
        {
            $id = Auth::user()->id;

            $cart = Cart::where('user_id', '=', $id)->get();

            $cartCount = $cart->count();

            return view('testimonial.body', compact('cartCount'));
        }
        else
        {
            return view('testimonial.body');
        }
    }
}

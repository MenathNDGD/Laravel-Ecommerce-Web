<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showAllProducts()
    {
        $product = Product::all();

        return view('product.body', compact('product'));
    }
}

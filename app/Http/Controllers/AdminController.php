<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category()
    {
        return view('admin.category');
    }

    public function add_category(Request $request)
    {
        $data = new Category;

        $data->category_name = $request->category_name;

        $data->save();

        return redirect()->back()->with('message', 'Category Added Successfully!');
    }
}

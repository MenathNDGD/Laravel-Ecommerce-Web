<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();

        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = new Category;

        $data->category_name = $request->category_name;

        $data->save();

        return redirect()->back()->with('message', 'Category Added Successfully!');
    }

    public function delete_category($id)
    {
        $data = Category::find($id);

        $data->delete();
        
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    public function add_product()
    {
        $category = Category::all();

        return view('admin.product', compact('category'));
    }

    public function add_product_items(Request $request)
    {
        $product = new Product();

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image = $imagename;

        $product->save();

        return redirect()->back()->with('message', 'Product Added Successfully');
    }

    public function view_product()
    {
        $product = Product::all();

        return view('admin.view_product', compact('product'));
    }

    public function delete_product($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->back()->with('message', 'Product Item Deleted Successfully');
    }

    public function update_product($id)
    {
        $product = Product::find($id);

        $category = Category::all();

        return view('admin.update_product', compact('product', 'category'));
    }

    public function update_product_confirm(Request $request, $id)
    {
        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;

        $image = $request->image;
        if ($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product->image = $imagename;
        }

        $product->save();

        return redirect('view_product')->with('message', 'Product Update Successfully');
    }

    public function view_orders()
    {
        $order = Order::all();

        return view('admin.view_orders', compact('order'));
    }

    public function delivered($id)
    {
        $order = Order::find($id);

        $order->delivery_status = "delivered";

        $order->payment_status = "paid";

        $order->save();

        return redirect()->back();
    }
}

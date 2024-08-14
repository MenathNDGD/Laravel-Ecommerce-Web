<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::paginate(3);

        $cartCount = 0;

        if (Auth::id())
        {
            $id = Auth::user()->id;

            $cartCount = Cart::where('user_id', '=', $id)->count();
        }

        return view('home.userpage', compact('product', 'cartCount'));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        $cartCount = 0;

        if (Auth::id()) 
        {
            $id = Auth::user()->id;

            $cartCount = Cart::where('user_id', '=', $id)->count();
        }

        if ($usertype == '1')
        {
            $totalProducts = Product::all()->count();
            $totalOrders = Order::all()->count();
            $totalUsers = User::all()->count();

            $order = Order::all();

            $totalRevenue = 0;

            foreach ($order as $order)
            {
                $totalRevenue = $totalRevenue + $order->price;
            }

            $totalOrdersDelivered = Order::where('delivery_status', '=', 'Delivered')->get()->count();
            $totalOrdersPending = Order::where('delivery_status', '=', 'Processing')->get()->count();

            return view('admin.home', compact('totalProducts', 'totalOrders', 'totalUsers', 'totalRevenue', 'totalOrdersDelivered', 'totalOrdersPending'));
        } 
        else 
        {
            $product = Product::paginate(3);

            return view('home.userpage', compact('product', 'cartCount'));
        }
    }

    public function product_details($id)
    {
        $product = Product::find($id);

        return view('home.product_details', compact('product'));
    }

    public function add_cart(Request $request, $id)
    {
        if (Auth::id())
        {
            $user = Auth::user();

            $product = Product::find($id);

            $cart = new Cart;

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;

            $cart->product_title = $product->title;

            if ($product->discount_price != null)
            {
                $cart->price = $product->discount_price * $request->quantity;
            }
            else
            {
                $cart->price = $product->price * $request->quantity;
            }

            $cart->image = $product->image;
            $cart->product_id = $product->id;

            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect()->back()->with('message', 'Product Added To The Cart Successfully');
        }
        else
        {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if (Auth::id())
        {
            $id = Auth::user()->id;

            $cart = Cart::where('user_id', '=', $id)->get();

            $cartCount = $cart->count();

            return view('home.show_cart', compact('cart', 'cartCount'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        $cart = Cart::find($id);

        $cart->delete();

        return redirect()->back()->with('message', 'Product Item Removed Successfully');
    }

    public function cash_order()
    {
        $user = Auth::user();

        $userId = $user->id;

        $data = Cart::where('user_id', '=', $userId)->get();

        foreach($data as $data)
        {
            $order = new Order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'Cash On Delivery';
            $order->delivery_status = 'Processing';

            $order->save();

            $cart_id = $data->id;

            $cart = Cart::find($cart_id);

            $cart->delete();
        }
        return redirect()->back()->with('message', 'Order Placed Successfully. We Will Connect With You Soon...');
    }

    public function stripe($totalPrice)
    {
        return view('home.stripe', compact('totalPrice'));
    }

    public function stripePost(Request $request, $totalPrice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
            "amount" => $totalPrice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks for Your Payment." 
        ]);

        $user = Auth::user();

        $userId = $user->id;

        $data = Cart::where('user_id', '=', $userId)->get();

        foreach($data as $data)
        {
            $order = new Order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'Paid Using Card';
            $order->delivery_status = 'Processing';

            $order->save();

            $cart_id = $data->id;

            $cart = Cart::find($cart_id);

            $cart->delete();
        }

        Session::flash('success', 'Payment Successful');
              
        return redirect()->back();
    }

    public function my_orders()
    {
        if (Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;

            $order = Order::where('user_id', '=', $userid)->get();

            return view('home.myOrders', compact('order'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {
        $order = Order::find($id);

        $order->delivery_status = 'You Canceled the Order';

        $order->save();

        return redirect()->back();
    }
}

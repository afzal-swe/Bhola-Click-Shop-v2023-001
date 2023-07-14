<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype == '1') {
            return view('admin.admin_master');
        } else {
            $product = Product::paginate(6);
            return view('frontend.home', compact('product'));
        }
    }

    // Frontend Route Section //
    public function index()
    {
        $product = Product::paginate(6);
        return view('frontend.home', compact('product'));
    }

    // Frontend Route Section Product Details//
    public function details($id)
    {
        $product_details = Product::findOrFail($id);
        return view('frontend.product_section.product_details', compact('product_details'));
    }

    // Add Cart Route Section Product//
    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {

            $user = Auth::user();
            $product = Product::find($id);


            $cart = new Cart();
            $cart->user_name = $user->name;
            $cart->user_email = $user->email;
            $cart->user_phone = $user->phone;
            $cart->user_address = $user->address;
            $cart->user_id = $user->id;

            $cart->product_title = $product->title;
            $cart->quantity = $product->quantity;
            $cart->product_id = $product->id;
            $cart->image = $product->image;

            if ($product->discount_price != null) {
                $cart->price = $product->discount_price;
            } else {
                $cart->price = $product->price;
            }


            $cart->save();

            $notification = array('message' => 'Add to Cart Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            return redirect('login');
        }
    }

    // Cart View Route Section //
    public function cart_view()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart_view = Cart::where('user_id', '=', $id)->get();

            return view('frontend.product_section.add_to_cart.view', compact('cart_view'));
        } else {
            return redirect('login');
        }
    }

    // Cansel Order Route Section //
    public function order_cancel($id)
    {
        Cart::findOrFail($id)->delete();
        $notification = array('message' => 'Order Cencel Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}

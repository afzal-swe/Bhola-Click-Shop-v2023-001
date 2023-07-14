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


            Cart::insert([
                'user_name' => $user->name,
                'user_email' => $user->email,
                'user_phone' => $user->phone,
                'user_address' => $user->address,
                'user_id' => $user->id,

                'product_title' => $product->title,
                'price' => $product->price,
                'quantity' => $product->quantity,
                'product_id' => $product->id,
                'image' => $product->image,
            ]);


            $notification = array('message' => 'Add to Cart Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            return redirect('login');
        }
    }
}

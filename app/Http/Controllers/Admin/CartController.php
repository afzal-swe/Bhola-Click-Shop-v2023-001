<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::all();
        return view('admin.add_to_cart.index', compact('cart'));
    }

    public function view($id)
    {
        $view = Cart::findOrFail($id);
        return view('admin.add_to_cart.view', compact('view'));
    }

    public function destroy($id)
    {

        Cart::findOrFail($id)->delete();

        $notification = array('message' => 'Add to Cart Delete Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}

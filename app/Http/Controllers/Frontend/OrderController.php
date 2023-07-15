<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    // Confirm Order From Route Section //
    public function order_info()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();

            return view('frontend.product_section.order_product_from.create', compact('cart'));
        } else {
            return redirect('login');
        }
    }

    // Product Order Confirm Store Function //
    public function order_store(Request $request)
    {


        $user = Auth::user();
        $user_id = $user->id;

        $data = Cart::where('user_id', '=', $user_id)->get();

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city' => 'required',
        ]);

        foreach ($data as $data) {


            $order = new Order();

            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->address = $request->address;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->city = $request->city;
            $order->zone = $request->zone;
            $order->comment = $request->comment;

            $order->user_id = $data->user_id;
            $order->product_name = $data->product_title;
            $order->product_price = $data->price;
            $order->product_id = $data->product_id;
            $order->total = $data->price;
            $order->product_quantity = $data->quantity;

            $order->delivery_method = $request->delivery_method;
            $order->payment_method = $request->payment_method;

            $order->save();

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();




            // Order::insert([
            //     'first_name' => $request->first_name,
            //     'last_name' => $request->last_name,
            //     'address' => $request->address,
            //     'phone' => $request->phone,
            //     'email' => $request->email,
            //     'city' => $request->city,
            //     'zone' => $request->zone,
            //     'comment' => $request->comment,

            //     'user_id' => $data->user_id,
            //     'product_name' => $data->product_title,
            //     'product_price' => $data->price,
            //     'product_id' => $data->product_id,
            //     'total' => $data->price,
            //     'product_quantity' => $data->quantity,

            //     'delivery_method' => $request->delivery_method,
            //     'payment_method' => $request->payment_method,

            // ]);
            $notification = array('message' => 'Order Confirm Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }
}

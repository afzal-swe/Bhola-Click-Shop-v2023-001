<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

use Illuminate\Support\Facades\Session;
use Stripe;

class OrderController extends Controller
{
    // Cash On Delivery Function Start //

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

        foreach ($data as $row) {


            $order = new Order();

            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->address = $request->address;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->city = $request->city;
            $order->zone = $request->zone;
            $order->comment = $request->comment;

            $order->user_id = $row->user_id;
            $order->product_name = $row->product_title;
            $order->product_price = $row->price;
            $order->product_id = $row->product_id;
            $order->total = $row->price;
            $order->product_quantity = $row->quantity;

            $order->delivery_method = $request->delivery_method;
            $order->delivery_status = 'Painding';
            $order->payment_method = $request->payment_method;
            $order->payment_status = 'Not Paid';

            $order->save();

            $cart_id = $row->id;
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

    // Cash On Delivery Function End //

    // Pay Using Card Function Start //


    public function stripe($total_price)
    {
        return view('frontend.product_section.order_product_from.stripe', compact('total_price'));
    }

    public function stripePost(Request $request, $total_price)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $total_price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks for Payment !"
        ]);



        $user = Auth::user();
        $user_id = $user->id;

        $data = Cart::where('user_id', '=', $user_id)->get();



        foreach ($data as $row) {


            $order = new Order();

            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->address = $request->address;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->city = $request->city;
            $order->zone = $request->zone;
            $order->comment = $request->comment;

            $order->user_id = $row->user_id;
            $order->product_name = $row->product_title;
            $order->product_price = $row->price;
            $order->product_id = $row->product_id;
            $order->total = $row->price;
            $order->product_quantity = $row->quantity;

            $order->delivery_method = "Pay Using Card";
            $order->delivery_status = 'Painding';
            $order->payment_method = "Pay Using Card";
            $order->payment_status = "Paid";

            $order->save();

            $cart_id = $row->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }

        $notification = array('message' => 'Payment Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }




    // Pay Using Card Function End //

    // View Order for user //
    public function order_view()
    {


        if (Auth::id()) {

            $user = Auth::user();
            $userid = $user->id;

            $order_view = Order::where('user_id', '=', $userid)->get();

            return view('frontend.order.index', compact('order_view'));
        } else {
            return redirect('login');
        }
    }
    // View Order for user //
    public function view_order($id)
    {
        $order_view = Order::find($id);

        if (Auth::id()) {
            return view('frontend.order.view', compact('order_view'));
        } else {
            return redirect('login');
        }
    }

    public function destroy($id)
    {

        Order::findOrFail($id)->delete();

        $notification = array('message' => 'Order Delete Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index()
    {
        $order_details = Order::all();
        return view('admin.order_section.index', compact('order_details'));
    }

    public function view($id)
    {
        $order_view = Order::findOrFail($id);
        return view('admin.order_section.view', compact('order_view'));
    }

    public function destroy($id)
    {
        Order::findOrFail($id)->delete();

        $notification = array('message' => 'Order Delete Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    // Delivery Order Function //
    public function delivered($id)
    {
        $order = Order::find($id);

        if ($order->delivery_status == "Painding") {
            $order->delivery_status = "Delivered";

            $order->save();

            $notification = array('message' => 'Order Delivery Confirm Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $order->delivery_status = "Painding";

            $order->save();

            $notification = array('message' => 'Order Delivery Cancel Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }
}

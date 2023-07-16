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
}

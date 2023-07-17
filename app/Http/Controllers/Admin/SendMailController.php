<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

class SendMailController extends Controller
{
    //
    public function send_mail($id)
    {
        $send_mail = Order::find($id);
        return view('admin.email_section.email', compact('send_mail'));
    }

    public function send_user_mail(Request $request, $id)
    {
        $send_mail = Order::find($id);

        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];
        Notification::send($send_mail, new SendEmailNotification($details));


        $notification = array('message' => 'Send Email Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}

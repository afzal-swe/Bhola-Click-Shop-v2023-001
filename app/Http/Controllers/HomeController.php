<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

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
}

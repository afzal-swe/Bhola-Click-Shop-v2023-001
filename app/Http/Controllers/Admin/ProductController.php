<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // All Product Show Function //
    public function index()
    {
        $product = Product::all();
        return view('admin.product_section.index', compact('product'));
    }

    // Create Product Function //
    public function create()
    {
        $category = Category::all();
        return view('admin.product_section.create', compact('category'));
    }

    // Product Store Function //
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'tags' => 'required',
        ]);

        if ($request->file('image')) {
            $img = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(500, 400)->save("image/product/" . $name_gen);
            $image = "image/product/" . $name_gen;

            Product::insert([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'description' => $request->description,
                'discount_price' => $request->discount_price,
                'tags' => $request->tags,
                'slug' => Str::of($request->title)->slug('-'),
                'image' => $image,
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);
            $notification = array('message' => 'Product Added Successfully', 'alert-type' => 'success');
            return redirect()->route('product.index')->with($notification);
        } else {
            Product::insert([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'description' => $request->description,
                'discount_price' => $request->discount_price,
                'tags' => $request->tags,
                'slug' => Str::of($request->title)->slug('-'),
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);
            $notification = array('message' => 'Product Added Successfully', 'alert-type' => 'success');
            return redirect()->route('product.index')->with($notification);
        }
    }

    // Edit Product Function //
    public function edit($id)
    {
        $edit = Product::findOrFail($id);
        $category = Category::all();
        return view('admin.product_section.edit', compact('edit', 'category'));
    }

    // Product Update Function //
    public function update(Request $request)
    {
        $update = $request->id;

        if ($request->file('image')) {
            $img = $request->file('image');
            @unlink(public_path('image/product/' . $update->image)); //replece this image
            $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(500, 400)->save("image/product/" . $name_gen);
            $image = "image/product/" . $name_gen;

            Product::findOrFail($update)->update([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'description' => $request->description,
                'discount_price' => $request->discount_price,
                'tags' => $request->tags,
                'slug' => Str::of($request->title)->slug('-'),
                'image' => $image,
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);
            $notification = array('message' => 'Product Update Successfully', 'alert-type' => 'success');
            return redirect()->route('product.index')->with($notification);
        } else {
            Product::findOrFail($update)->update([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'description' => $request->description,
                'discount_price' => $request->discount_price,
                'tags' => $request->tags,
                'slug' => Str::of($request->title)->slug('-'),
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);
            $notification = array('message' => 'Product Update Successfully', 'alert-type' => 'success');
            return redirect()->route('product.index')->with($notification);
        }
    }

    // Delete Product Function //
    public function destroy($id)
    {
        $delete = Product::findOrFail($id);
        $img = $delete->image;

        if ($img == NULL) {
            Product::findOrFail($id)->delete();
            $notification = array('message' => 'Product Delete Successfully', 'alert-type' => 'success');
            return redirect()->route('product.index')->with($notification);
        } else {
            unlink($img);
            Product::findOrFail($id)->delete();
            $notification = array('message' => 'Product Delete Successfully', 'alert-type' => 'success');
            return redirect()->route('product.index')->with($notification);
        }
    }
}

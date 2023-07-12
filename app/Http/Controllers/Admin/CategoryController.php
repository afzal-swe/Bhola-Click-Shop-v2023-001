<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Show All Category function //
    public function index()
    {
        $category = Category::all();
        return view('admin.category_section.index', compact('category'));
    }

    // Create Category From function //
    public function create()
    {
        return view('admin.category_section.create');
    }

    //  Category Store Function //
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories|max:25',
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => Str::of($request->category_name)->slug('-'),
        ]);
        $notification = array('message' => 'Add Product Category Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    // Category Edit Function //
    public function edit($id)
    {
        $edit = Category::findOrFail($id);
        return view('admin.category_section.edit', compact('edit'));
    }

    // Category Update Function //
    public function update(Request $request)
    {
        $update = $request->id;
        Category::findOrFail($update)->update([
            'category_name' => $request->category_name,
            'category_slug' => Str::of($request->category_name)->slug('-'),
        ]);
        $notification = array('message' => 'Update Category Successfully', 'alert-type' => 'success');
        return redirect()->route('category.index')->with($notification);
    }

    // Category Delete Function //
    public function destroy($id)
    {

        Category::findOrFail($id)->delete();

        $notification = array('message' => 'Delete Category Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}

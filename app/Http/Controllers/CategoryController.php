<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $categories = new Category();
        $categories->name = $request->name;
        $categories->save();
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view('categories.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $categories = Category::findOrFail($id);
        $categories->name = $request->name;
        $categories->save();
        return redirect()->route('categories.index', compact('categories'));
    }

    public function destroy($id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete();
        return redirect()->route('categories.index');
    }
}

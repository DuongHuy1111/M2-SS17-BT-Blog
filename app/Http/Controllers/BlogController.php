<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs/index', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('blogs/create',compact('categories'));
    }

    public function store(Request $request)
    {
        $blog = new Blog();
        $categories = Category::all();
        $blog->name = $request->name;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->category_id = $request->category_id;
        $blog->save();
        return view('blogs/create', compact('categories'));
    }

    public function delete($blogId)
    {
        $blog = Blog::find($blogId);
        return view('blogs/delete', compact('blog'));
    }

    public function destroy(Request $request, $blogId)
    {
        $blog = Blog::find($blogId);
        $blog->delete();
        return redirect()->route('index');
    }

    public function edit($blogId)
    {
        $blog = Blog::find($blogId);
        $categories = Category::all();
        return view('blogs/edit', compact('blog', 'categories'));
    }

    public function update(Request $request, $blogId)
    {
        $blog = Blog::findOrFail($blogId);
        $categories = Category::all();
        $blog->name = $request->name;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->category_id = $request->category_id;
        $blog->save();
        return redirect()->route('index', compact('categories', 'blog'));
    }
}

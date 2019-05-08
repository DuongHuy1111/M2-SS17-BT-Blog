<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $blogs = Blog::paginate(5);
        return view('blogs/index', compact('blogs','categories'));
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
        $blog->name = $request->input('name');
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
        $blog->name = $request->input('name');
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->category_id = $request->input('category_id');
        $blog->save();
        return redirect()->route('index', compact('categories', 'blog'));
    }

    public function filterByCategory(Request $request){
        $idCategory = $request->input('category_id');
        $categoryFilter = Category::findOrFail($idCategory);
        $blogs = Blog::where('category_id', $categoryFilter->id)->paginate(5);
        $totalBlogFilter = count($blogs);
        $categories = Category::all();
        return view('blogs.index', compact('categoryFilter', 'blogs', 'totalBlogFilter', 'categories'));
    }

    public function search(Request $request){
        $keyword = $request->input('keyword');
        if (!$keyword){
            return redirect()->route('index');
        }
        $blogs = Blog::where('name', 'LIKE', '%' . $keyword . '%')->paginate(5);
        $categories = Category::all();
        return view('blogs.index', compact('blogs', 'categories'));
    }
}

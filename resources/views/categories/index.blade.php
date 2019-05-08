@extends('home')
@section('title', 'Category List')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1 style="color: cadetblue">Category List</h1>
            </div>
            <div>
                <a href="{{route('categories.create')}}">
                    <button type="submit" class="btn btn-warning btn-sm">Create</button>
                </a>
                <a href="{{route('index')}}">
                    <button type="submit" class="btn btn-primary btn-sm">Blog</button>
                </a>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Category Number</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($categories) == 0)
                    <tr>
                        <td colspan="4">No data</td>
                    </tr>
                @else
                    @foreach($categories as $key => $category)
                        <tr>
                            <td scope="row">{{+$key}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{count($category->blog)}}</td>
                            <td>
                                <a href="{{route('categories.edit', ['id' => $category->id])}}">
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </a>
                            </td>
                            <td>
                                <a href="{{route('categories.delete', ['id' => $category->id])}}">
                                    <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('You sure want to delete? {{$category->name}}')">
                                        Delete
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
@extends('home')
@section('title', 'Add new category')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Add New Category</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{route('categories.store')}}">
                    @csrf
                    <div class="form-control">
                        <label>Category Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter category" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Create</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancle</button>
                </form>
            </div>
        </div>
    </div>
    @endsection
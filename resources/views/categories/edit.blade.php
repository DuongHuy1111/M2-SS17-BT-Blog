@extends('home')
@section('title', 'Update Category')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Add New Category</h1>
            </div>
            <div class="col-12">
                <form method="post" action="">
                    @csrf
                    <div class="form-control">
                        <label>Name Category</label>
                        <input type="text" class="form-control" name="name" value="{{$categories->name}}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancle</button>
                </form>
            </div>
        </div>
    </div>
    @endsection
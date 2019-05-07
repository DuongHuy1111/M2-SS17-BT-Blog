<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
<div class="container" style="width: 50%">
    <h2 style="color: darkolivegreen">Update Blog</h2>
    <form method="post" action="{{route('update', ['id' => $blog['id']])}}">
        @csrf
        <div class="from-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{$blog->name}}">
        </div>

        <div>
            <label>Title</label>
            <input type="text" class="form-control" name="title">
        </div>

        <div>
            <label>Description</label>
            <input type="text" class="form-control" name="description">
        </div>

        <div>
            <label>Category</label>
            <select name="category_id" class="custom-select">
                @foreach($categories as $category )
                    <option value="{{$category->id}}" {{$category->id == $blog->category_id ? 'selected' :''}}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{route('index')}}" class="btn btn-default">
            <button type="button" class="btn btn-primary">Back</button>
        </a>
    </form>
</div>
</body>
</html>
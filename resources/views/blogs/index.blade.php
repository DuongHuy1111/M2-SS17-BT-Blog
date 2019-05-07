<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

</head>
<body>
<div class="container">
    <div class="col-12">

            <h1 style="color: cadetblue">Blog</h1>
            <a href="{{route('create')}}">
                <button class="btn btn-warning btn-sm">Create</button>
            </a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Title</th>
                    <th scope="col">Desciption</th>
                    <th scope="col">Category</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($blogs))
                    @foreach($blogs as $blog)
                    <tr>
                        <td scope="row">{{$blog['id']}}</td>
                        <td>{{$blog['name']}}</td>
                        <td>{{$blog['title']}}</td>
                        <td>{{$blog['description']}}</td>
                        <td>{{$blog->category->name}}</td>
                        <td>
                            <a href="{{route('edit', ['id' =>$blog->id])}}">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </a>
                        </td>
                        <td>
                            <a href="{{route('delete', ['id' =>$blog->id])}}">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    @endforeach
                @endif
                </tbody>
            </table>
    </div>
</div>
</body>
</html>
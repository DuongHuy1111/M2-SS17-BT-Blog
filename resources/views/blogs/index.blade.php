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
        <div class="col-6">
            <a href="{{route('create')}}">
                <button class="btn btn-warning btn-sm">Create</button>
            </a>
            <a href="{{route('categories.index')}}">
                <button class="btn btn-primary btn-sm">Category</button>
            </a>

            <a class="btn btn-info btn-sm" href="" data-toggle="modal" data-target="#cityModal">Filter</a>
            <br>
        </div>
        <div class="col-6">

            @if(Session::has('success'))
                <p class="text-success" aria-hidden="true">
                    {{Session::get('success')}}
                </p>
            @endif

            @if(isset($totalBlogFilter))
                <span class="text-muted">{{'Find' . ' ' . $totalBlogFilter . ' ' . 'Blog'}}</span>
            @endif

            @if(isset($categoryFilter))
                <div class="pl-5">
                    <span class="text-muted"><i class="fa fa-check" aria-hidden="true"></i>{{'Belong' . ' ' . $categoryFilter->name}}</span>
                </div>
            @endif
        </div>
        <div class="col-6 offset-7">
            <form class="navbar-form navbar-left" action="{{route('search')}}" method="get">
                @csrf
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Search"
                                   value="{{(isset($_GET['keyword'])) ? $_GET['keyword']: ''}}">
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-default">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Title</th>
            <th scope="col">Desciption</th>
            <th scope="col">Category</th>
            <th></th>
            <th></th>
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
                            <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
                        </a>
                    </td>
                    <td>
                        <a href="{{route('delete', ['id' =>$blog->id])}}">
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                        </a>
                    </td>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="pagination float-right">
        {{ $blogs->appends(request()->query()) }}
    </div>
</div>


<div class="modal fade" id="cityModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <form method="get" action="{{route('filterByCategory')}}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="select-by-program">
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label border-right">Filter Category</label>
                            <div class="col-sm-7">
                                <select class="custom-select w-100" name="category_id">
                                    <option value="">Choose</option>
                                    @foreach($categories as $category)
                                        @if(isset($categoryFilter))
                                            @if($category->id == $categoryFilter->id)
                                                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                            @else
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endif
                                        @else
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="submitAjax" class="btn btn-primary">Chọn</button>
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Hủy</button>
                </div>
            </div>
        </form>
    </div>

</div>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todolist</title>
    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
    />
    <!-- MDB -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
        rel="stylesheet"
    />
</head>
<body class="bg-info">

<div class="container col-lg-4 col-md-6 mx-auto mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3>
                Todolist
            </h3>
            <form action="{{route('store')}}" method="POST" autocomplete="off">
                @csrf
                <div class="input-group">
                    <input type="text" name="content" class="form-control" placeholder="Add you todo item">
                    <button type="submit" class="btn btn-dark btn-sm px-4">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </form>
            @if (count($todolists))
                <ul class="list-group list-group-flush mt-3">
                    @foreach($todolists as $todolist)
                        <li class="list-group-item">
                            <form action="{{route('destroy', $todolist->id)}}" method="POST">
                                {{$todolist->content}}
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-link btn-sm float-end">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-center mt-3">
                    Todolist is empty.
                </p>
            @endif
        </div>
        @if(count($todolists))
            <div class="card-footer">
                You have {{count($todolists)}} pending tasks.
            </div>
        @endif
    </div>
</div>

</body>
</html>

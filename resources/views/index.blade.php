<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 8 Tags + Select2</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <style>
        .select2-selection {
            width: 500px;
        }
    </style>
</head>
<body class="bg-dark">
    <div class="container">
        <h1>Add post</h1>

        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
            Session::forget('success');
            @endphp
        </div>
        @endif

        <form action="{{ url('create-post') }}" method="POST">
            {{ csrf_field() }}
            <div class="mb-3">
                <input type="text" class="form-control" name="title" placeholder="Enter title">
                @if ($errors->has('title'))
                <span class="text-danger">{{ $errors->first('<title></title>') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <textarea class="form-control" name="content" placeholder="Enter content"></textarea>
                @if ($errors->has('content'))
                <span class="text-danger">{{ $errors->first('content') }}</span>
                @endif
            </div>

            <select class="js-example-tags" multiple="multiple" name="tags[]">
                <option>tag A</option>
                <option>tag B</option>
                <option>tag C</option>
            </select>


            <div class="d-grid">
                <button class="btn btn-info btn-submit">Submit</button>
            </div>
        </form>

        <div class="alert alert-primary mt-5 text-center">
            Post Collection
        </div>

        @if($posts->count())
        @foreach($posts as $key => $post)
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->content }}</p>
        <div>
            <strong>Tag:</strong>
            @foreach($post->tags as $tag)
            <label class="label label-info">{{ $tag->name }}</label>
            @endforeach
        </div>
        @endforeach
        @endif
    </div>
    <script>
        $(".js-example-tags").select2({
            tags: true
        });
    </script>
</body>
</html>
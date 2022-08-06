@extends('Layout/isUser')

@section('content')
    {{-- <h1>ini Homepage</h1> --}}

    <h3>{{ $title }}</h3>
    <hr>
    {{-- <div class="">
        <h3>Title : {{ $article->title }}</h3>
        <p>Deskripsi : {{ $article->description }}</p>
        <i>Tag : {{ $article->tag }}</i>
    </div> --}}
    {{-- {{ route('article_edit_action') }} --}}
    <form action={{ route('article_edit_action') }} method="post">
        @csrf
        <input class="form-control" type="hidden" name="id" value={{ $article->id }}>
        <div class="form-floating mb-3">
            <input class="form-control"id="floatingInput" required type="text" name="title" value='{{ $article->title }}'>
            <label for="floatingInput">Title article</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control"id="floatingInput" required type="text" name="description"
                value='{{ $article->description }}'>
            <label for="floatingInput">Description article</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control"id="floatingInput" required type="text" name="tag"
                value='{{ $article->tag }}'>
            <label for="floatingInput">Tag article</label>
        </div>
        <br>

        <button class="btn btn-success " type="submit" style="float: right"><i class="fa fa-check"></i>
            Save</button>
        <a href="/dashboard" class="btn btn-info"> Back</a>
    </form>
    <hr>
@endsection

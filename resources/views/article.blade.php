@extends('Layout/isGuest')

@section('content')
    {{-- <h1>ini Homepage</h1> --}}
    <h3>{{ $title }}</h3>
    <hr>
    <div class="">
        <h3>Title : {{ $article->title }}</h3>
        <p>Deskripsi : {{ $article->description }}</p>
        <i>Tag : {{ $article->tag }}</i>
    </div>
    <hr>
    <a href="/">Back</a>
@endsection

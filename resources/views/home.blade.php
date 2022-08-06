@extends('Layout/isGuest')

@section('content')
    <div class="demo-container">
        <div class="container">
            <div class="row">
                <div class="panel">
                    <h1>ini Homepage</h1>
                    {{ $title }}
                    {{-- {{ dd($articles) }} --}}
                    <div class="" style="padding: 10px">
                        @foreach ($articles as $item)
                            <div class="" style="padding: 10px">
                                <a href="/article/{{ $item->id }}" style="color: azure">{{ $item->title }}</a>
                            </div>
                            <hr>
                            {{-- <div class="">
                <h3>{{ $item->description }}</h3>
            </div>
            <div class="">
                <h3>{{ $item->tag }}</h3>
            </div> --}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

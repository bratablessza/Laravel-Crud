@extends('Layout/isUser')

@section('content')
    <div class="centered">
        <div class="card mb-3" style="max-width: 540px; opacity: 70%;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://github.githubassets.com/images/modules/profile/achievements/pull-shark-default.png"
                        class="img-fluid rounded-start rounded-end" alt="poto rusak">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $users->username }}</h5>
                        <p class="card-text">Role : as admin</p>
                        <blockquote class="blockquote mb-0">
                            <p>A well-known quote, contained in a blockquote element.</p>
                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source
                                    Title</cite></footer>
                        </blockquote>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

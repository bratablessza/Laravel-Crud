@extends('Layout/isUser')
<div class="" style="display: none">
    {{ $number = 1 }}
    {{ $count = $articles->total() / $articles->count() }}
    {{ $number = $articles->firstItem() }}
    {{ $lastItem = !!$articles->lastItem() }}
</div>

@section('content')
    <!--Grid row-->
    <div class="container">

        <div class="col-lg-12">
            {{-- {{ dd($users->token) }} --}}
            <h2>{{ $title }}</h2>

            <br><br>
            <button class="btn btn-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                aria-controls="offcanvasRight" style="float: right;"><i class="fa fa-plus"></i> Add new
                articles</button>
            <br><br><br>
            <div class="row">
                @if ($message = Session::get('message'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>Message!</strong> {{ session()->get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <tr></tr>
                <div class="col-lg-offset-1 col-lg-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col col-sm-3 col-xs-12">
                                    <h4 class="title">Data <span>Articles</span></h4>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Tag</th>
                                        <th style="width: 200px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $item)
                                        <tr>
                                            <td> {{ $number++ }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>#{{ $item->tag }}</td>
                                            <td style=" display: inline-block;">
                                                <div class="" style="margin-bottom: 10px;">
                                                    <a class="btn btn-success" href="/article/edit/{{ $item->id }}"
                                                        data-tip="edit" title="Edit"><i class="fa fa-edit"></i> Edit
                                                        article</a>
                                                </div>

                                                <div class="" style="margin-bottom: 20px;">
                                                    <form action={{ route('article_delete_action') }} method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value={{ $item->id }}>
                                                        <button type="submit" data-tip="delete" class="btn btn-danger"
                                                            title="Delete"><i class="fa fa-trash"> Delete article </i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- Pagination --}}
                            {{-- <div class="d-flex justify-content-center">
                                {!! $articles->links() !!}
                            </div> --}}
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col col-sm-6 col-xs-6">showing <b>{!! $articles->lastItem() !!} </b> out of
                                        <b>{!! $articles->total() !!}</b> entries
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <ul class="pagination hidden-xs pull-right">
                                            <li><a href="{!! $articles->previousPageUrl() !!}">
                                                    < </a>
                                            </li>

                                            @for ($i = 1; $i < $count; $i++)
                                                {{-- @if ($i = $lastItem)
                                                @endif --}}
                                                <li><a href="{!! $articles->url($i - 1) !!}"> {{ $i }} </a></li>
                                            @endfor

                                            <li><a href="{!! $articles->nextPageUrl() !!}"> > </a></li>
                                        </ul>
                                        {{-- <ul class="pagination visible-xs pull-right">
                                           
                                          
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="offcanvas offcanvas-end bg-transparent" tabindex="-1" id="offcanvasRight"
            aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel" style="color: azure">Article's</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="form-control panel">
                    <br>
                    <div class="col col-sm-6 col-xs-19" style="color: azure; margin-left: 30px;">
                        <h4 class="title">New <span>Articles</span></h4>
                    </div>
                    <br>
                    <form action={{ route('article_add_action') }} method="POST">
                        @csrf

                        <div class="form-floating mb-3 " style="margin-left: 10px; margin-right: 10px;">
                            <input type="text" class="form-control panel panel-heading title" id="floatingInput"
                                placeholder="Title" name="title" autocomplete="off" style="color: azure">
                            <label for="floatingInput" style="color: azure">Title article</label>
                        </div>
                        <div class="form-floating mb-3 " style="margin-left: 10px; margin-right: 10px;">
                            <input type="text" class="form-control panel" id="floatingInput" placeholder="Description"
                                name="description" autocomplete="off" style="color: azure">
                            <label for="floatingInput" style="color: azure">Description article</label>
                        </div>
                        <div class="form-floating mb-3" style="margin-left: 10px; margin-right: 10px;">
                            <input type="text" class="form-control panel" id="floatingInput" placeholder="Tag"
                                name="tag" autocomplete="off" style="color: azure">
                            <label for="floatingInput" style="color: azure">Tag article</label>
                        </div>

                        <button class="btn btn-success " type="submit"
                            style="float: right; margin-right:10px; margin-top:10px; "><i class="fa fa-plus"></i>
                            Add</button>
                        <button style="float: right; margin-right:10px; margin-top:10px; "type="button"
                            class="btn btn-danger" data-bs-dismiss="offcanvas" aria-label="Close">
                            Cancel</button>
                    </form>
                    <br><br><br>
                </div>
            </div>
        </div>
    @endsection

@extends('Layout/isGuest')

@section('content')
    {{-- <div>
        <h3>Login page</h3>
        <i>{{ session()->get('error') }}</i>
        <form action={{ route('login_action') }} method="POST">
            @csrf --}}
    {{-- crsf untuk definiton post! --}}
    {{-- <input type="username" name="username" placeholder="uName">
            <input type="password" name="password" placeholder="uPassword">
            <button type="submit">Login</button>
        </form>
    </div>
    <br> --}}

    <div class="demo-container">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mx-auto">
                    <div class="text-center pb-5"> <img src="{{ asset('img/logo.png') }}" alt="rusak"
                            style="margin-bottom: -80px;"> </div>
                    <div class="p-5 bg-white rounded shadow-lg">
                        @if ($message = Session::get('message'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <strong>Message : </strong> {{ session()->get('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @elseif($message = Session::get('messageError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Warning!</strong> {{ session()->get('messageError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @elseif($message = Session::get('messageSuccess'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session()->get('messageSuccess') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <h2 class="mb-2 text-center">Sign In</h2>
                        <p class="text-center lead">Sign In to manage all your devices</p>
                        <form action={{ route('login_action') }} method="POST">
                            @csrf
                            <label class="font-500">Email</label>
                            <input class="form-control form-control-lg mb-3" type="username" name="username"
                                placeholder="Username" autocomplete="off">
                            <label class="font-500">Password</label>
                            <input class="form-control form-control-lg" type="password" name="password"
                                placeholder="Password" autocomplete="off">
                            <p class="m-0 py-4"><a href="" class="text-muted">Forget password?</a></p>
                            <button class="btn btn-success btn-lg w-100 shadow-lg" type="submit">SIGN IN</button>
                        </form>
                        <div class="text-center pt-4">
                            <p class="m-0">Do not have an account? <a href="/signUp" data-bs-toggle="modal"
                                    data-bs-target="#signUpModal" class="text-dark font-weight-bold">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="signUpModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="text-align: end">

                    <h5 class="modal-title" id="staticBackdropLabel"> <img src="{{ asset('img/logo.png') }}" width="40"
                            alt="rusak" srcset=""> Sign up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action={{ route('signUpAction') }} method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="username" class="form-control" name="usernameInputan" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="bratablessza" required>
                            <div id="emailHelp" class="form-text">Masukkan username</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="passwordInputan" class="form-control" id="exampleInputPassword1"
                                required>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

        html,
        body {
            height: 100%;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #4158D0;
            background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
        }

        .demo-container {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-lg {
            padding: 12px 26px;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        ::placeholder {
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        .form-control-lg {
            font-size: 16px;
            padding: 25px 20px;
        }

        .font-500 {
            font-weight: 500;
        }
    </style>
@endsection

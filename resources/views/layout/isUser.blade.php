<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Brata Laravel dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <style>
        body {
            background-image: url({{ asset('img/bgs.jpg') }});
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .navbar- {
            text-align: right;
        }

        .collapse.navbar-collapse {
            align-items: flex-end;
            flex-direction: column-reverse;
        }

        .demo {
            font-family: 'Noto Sans', sans-serif;
        }

        .panel {
            background: linear-gradient(to right, #2980b9, #2c3e50);
            padding: 0;
            border-radius: 10px;
            border: none;
            box-shadow: 0 0 0 5px rgba(0, 0, 0, 0.05), 0 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .panel .panel-heading {
            padding: 20px 15px;
            border-radius: 10px 10px 0 0;
            margin: 0;
        }

        .panel .panel-heading .title {
            color: #fff;
            font-size: 28px;
            font-weight: 500;
            text-transform: capitalize;
            line-height: 40px;
            margin: 0;
        }

        .panel .panel-heading .btn {
            color: rgba(255, 255, 255, 0.5);
            background: transparent;
            font-size: 16px;
            text-transform: capitalize;
            border: 2px solid #fff;
            border-radius: 50px;
            transition: all 0.3s ease 0s;
        }

        .panel .panel-heading .btn:hover {
            color: #fff;
            text-shadow: 3px 3px rgba(255, 255, 255, 0.2);
        }

        .panel .panel-heading .form-control {
            color: #fff;
            background-color: transparent;
            width: 35%;
            height: 40px;
            border: 2px solid #fff;
            border-radius: 20px;
            display: inline-block;
            transition: all 0.3s ease 0s;
        }

        .panel .panel-heading .form-control:focus {
            background-color: rgba(255, 255, 255, 0.2);
            box-shadow: none;
            outline: none;
        }

        .panel .panel-heading .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
            font-size: 15px;
            font-weight: 500;
        }

        .panel .panel-body {
            padding: 0;
        }

        .panel .panel-body .table thead tr th {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.2);
            font-size: 16px;
            font-weight: 500;
            text-transform: uppercase;
            padding: 12px;
            border: none;
        }

        .panel .panel-body .table tbody tr td {
            color: #fff;
            font-size: 15px;
            padding: 10px 12px;
            vertical-align: middle;
            border: none;
        }

        .panel .panel-body .table tbody tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .panel .panel-body .table tbody .action-list {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .panel .panel-body .table tbody .action-list li {
            display: inline-block;
            margin: 0 5px;
        }

        .panel .panel-body .table tbody .action-list li a {
            color: #fff;
            font-size: 15px;
            position: relative;
            z-index: 1;
            transition: all 0.3s ease 0s;
        }

        .panel .panel-body .table tbody .action-list li a:hover {
            text-shadow: 3px 3px 0 rgba(255, 255, 255, 0.3);
        }

        .panel .panel-body .table tbody .action-list li a:before,
        .panel .panel-body .table tbody .action-list li a:after {
            content: attr(data-tip);
            color: #fff;
            background-color: #111;
            font-size: 12px;
            padding: 5px 7px;
            border-radius: 4px;
            text-transform: capitalize;
            display: none;
            transform: translateX(-50%);
            position: absolute;
            left: 50%;
            top: -32px;
            transition: all 0.3s ease 0s;
        }

        .panel .panel-body .table tbody .action-list li a:after {
            content: '';
            height: 15px;
            width: 15px;
            padding: 0;
            border-radius: 0;
            transform: translateX(-50%) rotate(45deg);
            top: -18px;
            z-index: -1;
        }

        .panel .panel-body .table tbody .action-list li a:hover:before,
        .panel .panel-body .table tbody .action-list li a:hover:after {
            display: block;
        }

        .panel .panel-footer {
            color: #fff;
            background-color: transparent;
            padding: 15px;
            border: none;
        }

        .panel .panel-footer .col {
            line-height: 35px;
        }

        .pagination {
            margin: 0;
        }

        .pagination li a {
            color: #fff;
            background-color: transparent;
            border: 2px solid transparent;
            font-size: 18px;
            font-weight: 500;
            text-align: center;
            line-height: 31px;
            width: 35px;
            height: 35px;
            padding: 0;
            margin: 0 3px;
            border-radius: 50px;
            transition: all 0.3s ease 0s;
        }

        .pagination li a:hover {
            color: #fff;
            background-color: transparent;
            border-color: rgba(255, 255, 255, 0.2);
        }

        .pagination li a:focus,
        .pagination li.active a,
        .pagination li.active a:hover {
            color: #fff;
            background-color: transparent;
            border-color: #fff;
        }

        .pagination li:first-child a,
        .pagination li:last-child a {
            border-radius: 50%;
        }

        @media only screen and (max-width:767px) {
            .panel .panel-heading .title {
                text-align: center;
                margin: 0 0 10px;
            }

            .panel .panel-heading .btn_group {
                text-align: center;
            }
        }
    </style>
    <div>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/dashboard">
                        <img src="{{ asset('img/logo.png') }}" alt="rusak" width="60" height="44">
                    </a>
                    {{-- <a class="navbar-brand" href="/">Laravel-Tak</a> --}}
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link active" aria-current="page" href="/userProfile/{{ $users->id }}"><i
                                    class="fa fa-user"></i><b> {{ $users->username }}</b></a>
                            <div style="align-items: flex-end;">
                                <form action={{ route('dashboard_logout') }} method="POST">
                                    @csrf
                                    <input class="form-control" type="hidden" name="token" value={{ $users->token }}>
                                    <button type="submit" class="btn btn-danger" style="float: right;"><i
                                            class="fa fa-sign-out"></i>
                                        Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <br>

        </header>
        <br><br><br>
        {{-- Our content gannnn --}}
        <div class="content">
            @yield('content')
            <br><br>
        </div>
        {{-- End of our content --}}

        <footer class="bg-transparent text-center text-white fixed-bottom opacity-10">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a class="btn btn-primary btn-outline-light btn-floating m-1" style="background-color: #3b5998;"
                        href="https://facebook.com/bratablessza" role="button"><i class="fa fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-primary btn-outline-light btn-floating m-1" style="background-color: #55acee;"
                        href="#" role="button"><i class="fa fa-twitter"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-primary btn-outline-light btn-floating m-1" style="background-color: #ac2bac;"
                        href="https://instagram.com/bratablessza" role="button"><i class="fa fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-primary btn-outline-light btn-floating m-1" style="background-color: #0082ca;"
                        href="https://linkedin.com/in/bratablessza" role="button"><i class="fa fa-linkedin"></i></a>
                    <!-- Github -->
                    <a class="btn btn-primary btn-outline-light btn-floating m-1" style="background-color: #333333;"
                        href="https://github.com/bratablessza" role="button"><i class="fa fa-github"></i></a>
                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3"
                style="background-color: rgba(173, 47, 47, 0.2); font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
                © 2022 Copyright:
                @bratablessza 😎
            </div>
            <!-- Copyright -->
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
</body>

</html>

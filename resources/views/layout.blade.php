<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->

    <!-- Link bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Styles -->
    <style>
    </style>
</head>

<body style="background-color: rgb(0, 0, 0);">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">ALLVids</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/upload">Upload</a>
                </li>
                @if (session()->has('user'))

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ session()->get('user')->user_name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#signupModal" href="#">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#loginModal" href="#">Login</a>
                </li>
                @endif
            </ul>
        </div>
    </nav>

    <!-- Sign Up Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form method="POST" action="/signupuser">
                            {{csrf_field()}}

                            <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                                placeholder="Email" />
                            <span class="text-danger">{{ $errors->signup->first('email') }}</span></br>

                            <input type="text" class="form-control" name="username" value="{{ old('username') }}"
                                placeholder="Username" />
                            <span class="text-danger">{{ $errors->signup->first('username') }}</span></br>

                            <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                                placeholder="Password" />
                            <span class="text-danger">{{ $errors->signup->first('password') }}</span>
                            <span class="text-success">{{ session()->get('regstatus') }}</span></br>

                            <input type="submit" class="btn btn-primary" value="Sign Up" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form method="POST" action="/loginuser">
                            {{csrf_field()}}
                            <input type="text" class="form-control" name="username" value="{{ old('username') }}"
                                placeholder="Username" />
                            <span class="text-danger">{{ $errors->login->first('username') }}</span></br>

                            <input type="password" class="form-control" name="password" value="{{ old('username') }}"
                                placeholder="Password" />
                            <span class="text-danger">{{ $errors->login->first('password') }}</span>
                            <span class="text-danger">{{ session()->get('logstatus') }}</span></br>

                            <input type="submit" class="btn btn-primary" value="Login" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ###########################
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger">{{$error}}</div>
    @endforeach
    @endif
    ################################ -->

    @yield('content')

    <!-- Link bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>

    <!-- Tigger bootstrap Models -->
    @if ($errors->signup->any())
    <script>$('#signupModal').modal('show');</script>
    @endif

    @if ($errors->login->any())
    <script>$('#loginModal').modal('show');</script>
    @endif

    @if (session()->has('regstatus'))
    <script>$('#signupModal').modal('show');</script>
    @endif

    @if (session()->has('logstatus'))
    <script>$('#loginModal').modal('show');</script>
    @endif



</body>

</html>
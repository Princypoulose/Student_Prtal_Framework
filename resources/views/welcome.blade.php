<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body, html {
                    height: 100%;
                    margin: 0;
                }

        .bg {
            /* The image used */

            background-image: url('assets/img/LDS1.jpg');
            /* Full height */
            height: 100%;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .hd {
            padding-top: 3%;
            font-style: normal;
            font-display: block;
            /* background-image: url('login.png'); */
        }
        .txt{
            padding:4%;
            font-size:50px;
            color:white;
        }
        .ht{
            height:15%;
            padding:3%;
        }
    </style>
</head>
<body>

    <div class="row">
        <div class="col-sm-2">
            <img src="{{ asset('assets/img/lbu.png') }}" />
        </div>
        <div class="col-sm-8">

        </div>
        <div class="col-sm-2 hd">
            <a href="{{ route('register') }}">Register</a>
        </div>

    </div>
    <div class="container-fluid bg ">
        <p class="txt">
            Welcome to LeedsBeckett<br />
            University
        </p>
        <div class="row ">
            <div class="container">
                <div class="row">
                    <div class="col-sm-1"></div>

                    <div class="col-sm-4 ht" style="background-color:white;">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form enctype="application/json" onSubmit="login(event)">
                            @csrf

                            <div class="mb-3 mt-3 ">

                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" placeholder="Enter student id" name="student_id">
                            </div>
                            <div class="mb-3">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                            </div>
                            <div class="form-check mb-3">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/js/ajax.js') }}"></script>
</body>
</html>

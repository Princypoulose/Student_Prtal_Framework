<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Styles -->
    <style>
        body {
            margin: 0;
            font-family: "Lato", sans-serif;
            background-color: white;
        }

        .sidebar {
            margin: 0;
            margin-left: -25px;
            padding: 0;
            width: 200px;
            background-color: #f1f1f1;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

            .sidebar a {
                display: block;
                color: black;
                padding: 16px;
                text-decoration: none;
            }

                .sidebar a.active {
                    background-color: #04AA6D;
                    color: white;
                }

                .sidebar a:hover:not(.active) {
                    background-color: #555;
                    color: white;
                }

        div.content {
            margin-left: 200px;
            padding: 1px 16px;
            height: 1000px;
        }

        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

                .sidebar a {
                    float: left;
                }

            div.content {
                margin-left: 0;
            }
        }

        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }

        .txt {
            padding: 1%;
            font-size: 40px;
            color: brown;
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="continer">
            <div class="row txt">
                <div class="col-sm-6 ">
                    STUDENT PORTAL
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <div class="sidebar">
                <a class="active" href="{{ url('home') }}">Home</a>
                <a href="{{ url('courses') }}">All Courses</a>
                <a href="{{ url('graduation') }}">Graduation</a>
                <a href="{{ url('invoices') }}">Invoices</a>
                <a href="{{ url('signout') }}">Sign Out</a>
            </div>


            <div class="content">
                <h2>Student Details</h2>

                @if($student)
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $student['first_name'] }} {{ $student['last_name'] }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $student['student_id'] }}</h6>
                            <p class="card-text">
                                <strong>Email:</strong> {{ $student['email'] }}<br>
                                <strong>Phone:</strong> {{ $student['phone'] }}<br>
                                <strong>Date of Birth:</strong> {{ $student['date_of_birth'] }}<br>
                                <strong>Gender:</strong> {{ $student['gender'] }}<br>
                                <strong>Is Active:</strong> {{ $student['is_active'] ? 'Yes' : 'No' }}<br>
                                <strong>Is Graduated:</strong> {{ $student['is_graduated'] ? 'Yes' : 'No' }}
                            </p>
                        </div>
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        No data available
                        {{print_r($data)}}
                    </div>
                @endif
            </div>

        </div>
    </div>
</body>
</html>

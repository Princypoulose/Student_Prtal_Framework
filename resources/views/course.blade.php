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
                <a href="{{ url('home') }}">Home</a>
                <a class="active" href="{{ url('courses') }}">All Courses</a>
                <a href="{{ url('graduation') }}">Graduation</a>
                <a href="{{ url('invoices') }}">Invoices</a>
                <a href="{{ url('signout') }}">Sign Out</a>
            </div>


           <!-- other code -->

<div class="content">
    <h2>Courses</h2>

    <table class="table table-bordered">
        <tr>
            <th>Course ID</th>
            <th>Course Name</th>
            <th>Fees</th>
            <th>Action</th>
        </tr>
        @if($courses)
            @foreach($courses['data'] as $course)
                <tr>
                    <td>{{ $course['course_id'] }}</td>
                    <td>{{ $course['course_name'] }}</td>
                    <td>{{ $course['fees'] }}</td>
                    <td>
                        @if($course['is_enrolled'])
                        Already enrolled.
                        @else
                        <form method="POST" action="{{ route('enroll') }}">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $course['_id'] }}">
                            <button type="submit" class="btn btn-primary">Enroll</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4">No data available {{print_r($data)}}</td>
            </tr>
        @endif
    </table>
</div>

<!-- other code -->


        </div>
    </div>
</body>
</html>

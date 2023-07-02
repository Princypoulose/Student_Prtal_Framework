<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }
        input[type=password],select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

            input[type=submit]:hover {
                background-color: #45a049;
            }

        .container {
            border-radius: 5px;
            //background-color: #f2f2f2;
            padding: 20px;
        }

        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
            .col-25, .col-75, input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
        .sidebar {
            margin: 0;
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
        .txt{
            text-align:center;
            font-size:larger;
        }
        .txt1 {
            padding: 1%;
            font-size: 40px;
            color: brown;
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="container">
            <div class="row txt1">
                <div class="col-sm-6">
                    STUDENT PORTAL
                </div>
            </div>
        </div>
        <div class="container">
            <div class="sidebar">
                <a class="active" href="{{ route('register') }}">Student Registration</a>
                <a href="/">Login</a>
            </div>
        </div>
        <div class="container">
        <div class="row">
                <div class="col-sm-4">

                </div>
                <div class="col-sm-4 txt">
                    <b> STUDENT REGISTRATION</b>
                </div>
            </div>
            <form onSubmit="register(event)">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="first_name" placeholder="Your name..">
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="last_name" placeholder="Your last name..">
                    <label for="add">Address</label>
                    <input type="text" id="add" name="address" placeholder=" Address">
                    <label for="ph">Phone</label>
                    <input type="text" id="ph" name="phone" placeholder="Phone Number">
                    <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" name="date_of_birth"><br/>
                    <label for="rad">Gender</label>
                    <input type="radio" id="rad" name="gender" value="male"> Male <input type="radio" id="rad" name="gender" value="female" checked> Female<br/>
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Email">
                    <label for="pwd">Password</label><br>
                    <input type="password" id="pwd" name="password" placeholder="Password">


                </div>

            </div>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-3">
                     <input type="submit" value="Submit">
                </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/js/ajax.js') }}"></script>
</body>
</html>

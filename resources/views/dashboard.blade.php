@php
if (empty(session('user_id'))){
    header("Location: /login");
    exit();
}
$candidate = \App\Models\User::where('id',session('user_id'))->first();
@endphp
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Candidate Dashboard</title>
    <link href="{{asset('assets/vendor/fontawesome/css/fontawesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/fontawesome/css/solid.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/fontawesome/css/brands.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/master.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/flagiconcss/css/flag-icon.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/courseCard.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">-->

    <style>
        @font-face {
    font-family: Nunito;
    src: url({{asset('fonts/Nunito.ttf')}});
    }
        body {
            font-family: Nunito;
          background-color: #FFE5AD;
          background-image:url('https://i.ibb.co/nzrCkjR/doodle-bg.png');;
        }
        

        #sidebar{
            background-color: #FFF3C7;
            color: #00224D !important;
            border:none;
            font-weight: 600;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        #sidebar ul li a {
            color: #6C22A6;
            font-size:18px;
        }
    
        .navbar {
            background: linear-gradient(45deg, #405DE6, #5851DB, #833AB4, #C13584, #E1306C, #FD1D1D, #F56040, #F77737, #FCAF45, #FFDC80);
            background-size: 200% 200%;
            animation: gradient-animation 10s ease infinite;
            box-shadow: 0 4px 8px rgba(46, 42, 42, 0.1);
        }
        /*@keyframes gradient-animation {*/
        /*    0% { background-position: 0% 50%; }*/
        /*    50% { background-position: 100% 50%; }*/
        /*    100% { background-position: 0% 50%; }*/
        /*}*/
        .card-fin {
          border: none;
          background-color: #DCFFB7;
          border-radius: 10px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          transition: box-shadow 0.3s ease-in-out;
        }
        
        .card-header {
      background-color: #343a40;
      color: #fff;
      text-align: center;
      font-weight: bold;
    }
    
        .card:hover {
          box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
    
        .card-img-top {
          border-top-left-radius: 10px;
          border-top-right-radius: 10px;
        }
    
        .card-title {
          color: #FFF3C7;
        }
    
        .btn-outline-primary {
          color: #007bff;
          border-color: #007bff;
        }
    
        .btn-outline-primary:hover {
          background-color: #007bff;
          color: #fff;
        }

        .nav-list {
            background-color: #DCFFB7;
        }
    .form-group {
      margin-bottom: 15px;
    }

    .message {
      font-size: 18px;
      color: #333;
      text-align: center;
    }

    .form {
      background-color: #343a40;
      color: #fff;
      padding: 20px;
      border-radius: 10px;
        border: 3px solid #F8DE22;
        box-shadow: 0 0 10px #F8DE22;  
    }
    
    h3{
        /*border: 3px solid #F8DE22;*/
        border-radius:4px;
        padding:6px;
        background-color: #FFF7D4;
        color: #F8DE22 !important;
        box-shadow: 0 0 10px #F8DE22;
    }

    .form input{
      color:#343a40 !important;
      font-weight: bold !important;
    }

    .form-label {
      font-weight: bold;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
    /* for empAttendance ends here */
      </style>
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="active">
            <div class="sidebar-header">
                <img height="42" width="200" src="{{asset('assets/images/logo/logo.png')}}" alt="Logic era Logo" class="app-logo">
            </div>
            <ul class="list-unstyled components text-white">
                <li>
                    <a href="{{ route('candSession') }}"><i class="fas fa-user"></i> Candidate Session 2</a>
                </li>
                <li>
                    <a href="{{ route('view.candidate') }}"><i class="fas fa-book"></i> Enrolled Candidate</a>
                </li>
                <li>
                    <a href="{{ url('https://docs.google.com/forms/d/e/1FAIpQLSeS_GTSY9Od5Bnz4o72l077vdONe2vLuGtU7W_d0Ne_BdKJPw/viewform') }}"><i class="fas fa-pen-to-square"></i> Query Form</a>
                </li>
                <li>
                    <a href="{{ route('issue.candidate') }}"><i class="fas fa-award"></i>Issue Certificate</a>
                </li>
                <li>
                    <a href="{{ route('createFeeRecord') }}"><i class="fas fa-coins"></i>Collect Fee Payment</a>
                </li>
                <li>
                    <a href="{{ route('defaulters.list') }}"><i class="fas fa-user-xmark"></i>Defaulters List</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"><i class="fas fa-arrow-right-from-bracket"></i>Logout</a>
                </li>
            </ul>
        </nav>
        <div id="body" class="active">
            <!-- navbar navigation component -->
            <!-- <nav class="navbar navbar-expand-lg navbar-white bg-white"> -->
            <nav class="navbar navbar-expand-lg">
                <button type="button" id="sidebarCollapse" class="btn btn-light">
                    <i class="fas fa-bars"></i><span></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                </div>
            </nav>
            <!-- end of navbar navigation -->
            @yield('content')
        </div>
    </div>
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/chartsjs/Chart.min.js')}}"></script>
    <script src="{{asset('assets/js/dashboard-charts.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>

</html>

@php
if (!empty(session('user_id'))){
    header("Location: /candidate/session/2");
    exit();
}
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


  <title>Admin Login</title>
  
   <style>
    @font-face {
    font-family: Nunito;
    src: url({{asset('fonts/Nunito.ttf')}});
    }
    body {
        font-family: Nunito;
        background-color: #FFF7D4;
        background-image: url('https://i.ibb.co/nzrCkjR/doodle-bg.png');
    }

    
    .container {
      max-width: 540px;
      margin: auto;
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
    </style>
</head>
<body>



    <div class="container mt-5">
        <h3 class="text-center text-success"><i class="fas fa-rocket"></i></i> Admin Login Portal</h3>
        <form action="{{route('loginAdmin')}}" method="POST" class="form">
            @csrf

            <!-- Display Validation Errors -->
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            <div class="form-group mb-3">
                <label for="username" class="form-label">Email*</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Your Email Address" required>
            </div>
            <div class="form-group mb-3">
                <label for="password" class="form-label">Password*</label>
                <input type="password" name="password" class="form-control" required>
            </div>


            
            <button class="btn btn-primary">Login</button>

        </form>
    </div>

  <!-- Bootstrap JS CDN (Optional: If you need Bootstrap JavaScript features) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional: Add your own script tags or additional JS links here -->
</body>
</html>

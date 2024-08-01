<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


  <title>Admin Registration</title>
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
      max-width: 720px;
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
        <h1 class="text-center text-success">Admin Registration</h1>
        <form action="{{route('signupAdmin')}}" method="POST" class="form mb-5">
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
                <label for="username" class="form-label">Admin Name*</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required>
            </div>
            <div class="form-group mb-3">
                <select name="usertype" class="form-select" aria-label="Default select example">
                    <option selected>Select your Admin Type</option>
                     <option value="client">Client</option>
                     <option value="admin">Admin</option>
                </select>
            </div>
             
            <div class="form-group mb-3">
                <label for="email" class="form-label">Email*</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Your Email Address" required>
            </div>
            <div class="form-group mb-3">
                <label for="password" class="form-label">Password*</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="confirmpassword" class="form-label">Confirm Password*</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>

  <!-- Bootstrap JS CDN (Optional: If you need Bootstrap JavaScript features) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional: Add your own script tags or additional JS links here -->
</body>
</html>

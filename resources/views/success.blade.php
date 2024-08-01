<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <title>Success Page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .success-container {
            text-align: center;
            background-color: #4caf50;
            color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .success-icon {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .success-message {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .redirect-message {
            font-size: 16px;
        }

        .redirect-link {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .redirect-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<!-- ========================= Registration Successful Message ===================== -->
@if (isset($candidateData->studentID))
<div class="success-container">
        <div class="success-icon">&#10004;</div>
        <div class="success-message">Hi, {{$candidateData->name}} Your Registration is Successful!<br>Your Registration Number: {{$candidateData->studentID}}</div>
        <a class="btn btn-primary" href="{{route('create.candidate')}}">Add new Record</a>
        <a class="btn btn-primary" href="{{route('candSession')}}">Back To Dashboard</a>
</div>
@endif


<!-- ========================= Admin Successful Message ===================== -->
@if (isset($adminData->name))
<div class="success-container">
        <div class="success-icon">&#10004;</div>
        <div class="success-message">Hi, {{$adminData->name}} Your Registration is Successful!</div>
        <a class="btn btn-primary" href="{{route('login')}}">Login To Continue</a>
</div>
@endif


<!-- ========================== Certificate Message ================================ -->
@if (isset($certNumber))
<div class="success-container">
        <div class="success-icon">&#10004;</div>
        <div class="success-message">Hi, Your Certificate is Successfully issued!<br>Your Certificate Number: {{$certNumber}}</div>
        <a class="btn btn-primary" href="{{route('issue.candidate')}}">Issue New Records</a>
        <a class="btn btn-primary" href="{{route('candSession')}}">Back To Dashboard</a>
</div>
@endif

<!-- ========================= Fee Payment Status ========================================== -->
@if(isset($feeRecord->candreg_id))
<div class="success-container">
        <div class="success-icon">&#10004;</div>
        <div class="success-message">Fee Payment has been Collected Successfully</div>
        <a class="btn btn-primary" href="{{route('createFeeRecord')}}">Collect New Records</a>
        <a class="btn btn-primary" href="{{route('candSession')}}">Back To Dashboard</a>
</div>
@endif


</body>
</html>
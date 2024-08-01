@php
if (empty(session('user_id'))){
    header("Location: /login");
    exit();
}
@endphp
@extends('dashboard')

@section('content')
    <div class="container mt-5">
        <h3 class="text-center text-success">Certificate Issue Portal</h3>
        <form action="{{route('issueCert')}}" method="POST" enctype="multipart/form-data" class="form mb-5">
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
                <label for="StudentID" class="form-label">StudentID*</label>
                <input type="text" name="studentID" class="form-control" @if(isset($studentID)) value="{{$studentID}}" @endif placeholder="Enter StudentID" required>
            </div>
            <div class="form-group mb-3">
                <label for="Certificate-Number" class="form-label">Certificate Number*</label>
                <input type="text" name="certNumber" class="form-control" placeholder="Enter Certificate Number" required>
            </div>
            <div class="form-group mb-3">
                <label for="Upload-Certifcate" class="form-label">Upload Certificate*</label>
                <input type="file" name="certPDF" class="form-control" placeholder="Enter Certificate Number" required>
                <div class="form-text text-white">Note: PDF file size should not exceed 5MB</div>
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
@php
if (empty(session('user_id'))){
    header("Location: /login");
    exit();
}
@endphp
@extends('dashboard')

@section('content')

    <div class="container mt-5">
        <h3 class="text-center text-success">Edit Candidate Registration</h3>
        <form action="{{route('updateCand')}}" method="POST" class="form mb-5">
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
            
                <input type="hidden" name="id" class="form-control" value="{{$candidate->id}}" required>

            <div class="form-group mb-3">
                <label for="dateofAdmission" class="form-label">Date of Admission*</label>
                <input type="date" name="admissionDate" class="form-control" value="{{$candidate->admissionDate}}" required>
            </div>
            
            <div class="form-group mb-3">
                <label for="StudentID" class="form-label">StudentID*</label>
                <input type="text" name="studentID" class="form-control" value="{{$candidate->studentID}}" required>
                <div id="formatHelper" class="form-text text-white">Format: 2digit(year)-initial_letter(course)-2digit(month)-2digit(day)-2digit(nth student during that day)</div>
            </div>
            
            <div class="form-group mb-3">
                <label for="Candidate-Name" class="form-label">Candidate Name*</label>
                <input type="text" name="name" class="form-control" value="{{$candidate->name}}" required>
            </div>
            
            <div class="form-check">
                <input type="radio" name="gender" value="male" class="form-check-input" {{($candidate->gender == 'male') ? 'checked' : '' }}>
                <label for="male" class="form-check-label">Male</label>
            </div>
            
            <div class="form-check">
                <input type="radio" name="gender" value="female" class="form-check-input" {{($candidate->gender == 'female') ? 'checked' : '' }}>
                <label for="female" class="form-check-label">Female</label>
            </div>
            
            <div class="form-group mb-3">
                <label for="parent" class="form-label">Parent's Name</label>
                <input type="text" name="pname" class="form-control" value="{{$candidate->pname}}">
            </div>
            
            <div class="form-group mb-3">
                <label for="Mobile-Number" class="form-label">Mobile Number</label>
                <input type="number" name="phoneNumber" class="form-control" value="{{$candidate->phoneNumber}}">
            </div>
            
            <div class="form-group mb-3">
                <label for="dateofBirth" class="form-label">Date of Birth</label>
                <input type="date" name="birthDate" class="form-control" value="{{$candidate->birthDate}}">
            </div>
            
            <div class="form-group mb-3">
                <label for="course" class="form-label">Course*</label>
                <select name="course" class="form-select">
                    <option {{($candidate->course == 'male') ? 'checked' : '' }} value="adca">ADCA</option>
                    <option {{($candidate->course == 'pgdca') ? 'selected' : '' }} value="pgdca">PGDCA</option>
                    <option {{($candidate->course == 'ccc') ? 'selected' : '' }} value="ccc">CCC</option>
                    <option  {{($candidate->course == 'olevel') ? 'selected' : '' }} value="olevel">O Level</option>
                    <option  {{($candidate->course == 'webdev') ? 'selected' : '' }} value="webdev">WebDev</option>
                    <option  {{($candidate->course == 'datascience') ? 'selected' : '' }} value="datascience">Data Science</option>
                    <option  {{($candidate->course == 'dca') ? 'selected' : '' }} value="dca">DCA</option>
                </select>
            </div>
            
            <div class="form-group mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" name="address" id="" rows="5">{{$candidate->address}}</textarea>
            </div>
            
            <div class="form-group mb-3">
                <label for="parent" class="form-label">Aadhar Card Number</label>
                <input type="number" name="a-card" class="form-control" placeholder="Enter Aadhar Number">
            </div>
            
            <div class="form-group mb-3">
                <label for="Fee" class="form-label">Fee Type*</label>
                <select name="status" class="form-select">
                    <option {{($candidate->status == 'regular') ? 'selected' : '' }} value="regular">Regular</option>
                    <option {{($candidate->status == 'discounted') ? 'selected' : '' }} value="discounted">Discounted</option>
                </select>
            </div>
            
            <div class="form-group mb-3">
                <label for="Refer By" class="form-label">Referred By</label>
                <input type="text" name="referBy" class="form-control" @if(isset($candidate->referBy)) value="{{$candidate->referBy}}" @endif>
            </div>
            <button class="btn btn-primary">Submit</button>

        </form>
    </div>
@endsection

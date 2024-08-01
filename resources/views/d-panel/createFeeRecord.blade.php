@php
if (empty(session('user_id'))){
    header("Location: /login");
    exit();
}
@endphp
@extends('dashboard')

@section('content')
    <div class="container mt-5">
        <h3 class="text-center text-success">Candidate Fee Entry Portal</h3>
        <form action="{{route('feePayment')}}" method="POST" class="form mb-5">
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
        
        @if(isset($candidate->name))
            <div class="form-group mb-3">
                <h2 class="text-center">{{$candidate->name}}</h2>
            </div>
        @endif
            
            <div class="form-group mb-3">
                <label for="Fee Date" class="form-label">Fee Date*</label>
                <input type="date" name="feeDate" class="form-control" required>
            </div>
            
            <div class="form-group mb-3">
                <label for="StudentID" class="form-label">Student ID*</label>
                <input type="text" name="candreg_id" class="form-control" @if(isset($candidate->name)) value="{{ $candidate->studentID }}" @endif placeholder="Enter StudentID" required>
            </div>
            
            <div class="form-group mb-3">
                <label for="Fee Amount" class="form-label">Fee Amount*</label>
                <input type="number" name="feeAmount" class="form-control" placeholder="Rs 500, Rs 1000, Rs 1500" required>
            </div>
            
            <div class="form-group mb-3">
                <label for="Fee Type" class="form-label">Fee Type*</label>
                <select name="feeType" class="form-select">
                    <option selected value="regular">Regular</option>
                    <option value="discounted">Discounted</option>
                </select>
            </div>
            
            <div class="form-group mb-3">
                <label for="course" class="form-label">Split Status*</label>
                <select name="splitStatus" class="form-select">
                    <option selected value="harsh">Harsh</option>
                    <option value="pankaj">Pankaj</option>
                    <option value="splited">Splited</option>
                </select>
            </div>
            
            <div class="form-group mb-3">
                <label for="comment" class="form-label">Comment</label>
                <textarea name="comment" class="form-control" placeholder="Any Important Notes!"></textarea>
            </div>
            
            <button class="btn btn-primary">Submit</button>

        </form>
    </div>
    @endsection
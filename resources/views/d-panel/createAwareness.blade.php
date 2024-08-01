@php
if (empty(session('user_id'))){
    header("Location: /login");
    exit();
}
@endphp
@extends('dashboard')

@section('content')

    <div class="container mt-5">
        <h3 class="text-center text-success">Awareness Form</h3>
        <form action="{{route('store.awareness')}}" method="POST" class="form mb-5">
            @csrf
            
            @if(session()->has('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            
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
                <label for="Candidate-Name" class="form-label">Candidate Name*</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
            </div>
            
            <div class="form-group mb-3">
                <label for="Mobile-Number" class="form-label">Mobile Number</label>
                <input type="number" name="mobile" class="form-control">
            </div>
            
            <div class="form-group mb-3">
                <label for="course" class="form-label">Course*</label>
                <select name="course" class="form-select">
                    <option value="olevel">O Level</option>
                    <option value="ccc">CCC</option>
                    <option selected value="adca">ADCA</option>
                    <option value="dca">DCA</option>
                    <option value="pgdca">PGDCA</option>
                    <option value="webdev">WebDev</option>
                    <option value="datascience">Data Science</option>
                </select>
            </div>
            
            <div class="form-group mb-3">
                <label for="address" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="" rows="5"></textarea>
            </div>
            
            <button class="btn btn-primary">Submit</button>

        </form>
    </div>
@endsection
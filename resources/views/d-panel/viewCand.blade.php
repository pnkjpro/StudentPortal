@php
if (empty(session('user_id'))){
    header("Location: /login");
    exit();
}
@endphp
@extends('dashboard')

@section('content')
    <!-- ===========================================================================================  -->
    <div class="container">
        <div class="container mt-1">
            <a href="{{ route('create.candidate') }}" class="btn btn-primary text-right mt-3 mb-2">Create Registration</a>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12">
                    <div class="card-fin">
                        <h3 class="card-header"> Enrolled Candidate</h3>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                             <th>Roll No.</th>
                                            <th>Name</th>
                                            <th>Father's Name</th>
                                            <th>Gender</th>
                                            <th>Date of Birth</th>
                                            <th>Mobile No.</th>
                                            <th>Course</th>
                                            <th>Address</th>
                                            <th>Admission Date</th>
                                            <th>Certificate No.</th>
                                            <!--<th>Status</th>-->
                                            <!--<th>Mode</th>-->
                                            <th colspan="2">Action</th>
                                            <!-- <th colspan="2">Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="recordTableBody">
                                        @foreach($cands as $cand)
                                        <tr>
                                            <td>{{ $cand->studentID }}</td>
                                            <td>{{ $cand->name }}</td>
                                            <td>{{ $cand->pname }}</td>
                                            <td>{{ $cand->gender }}</td>
                                            <td>{{ $cand->birthDate }}</td>
                                            <td>{{ $cand->phoneNumber }}</td>
                                            <td>{{ $cand->course }}</td>
                                            <td>{{ $cand->address }}</td>
                                            <td>{{ $cand->admissionDate }}</td>
                                            <td>{{ $cand->certNumber }}</td>
                                            <!--<td>{{ $cand->status }}</td>-->
                                            <!--<td>{{ $cand->mode }}</td>-->
                                            <td>
                                                <form action="{{ route('editCandidate') }}" method="POST">
                                                    @csrf
                                                    <input type="number" name="id" value="{{ $cand->id }}" hidden>
                                                    <button class="btn btn-warning">Edit</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form id="deleteForm{{ $cand->id }}" action="{{ route('candDelete') }}" method="POST">
                                                        @csrf
                                                        <input type="number" name="id" value="{{ $cand->id }}" hidden>
                                                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $cand->id }})">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{$cands->onEachSide(1)->links()}}
        </div>
    </div>
    
    <!-- ===========================================================================================  -->
    
    <script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this candidate?')) {
            document.getElementById('deleteForm' + id).submit();
        }
    }
</script>
@endsection

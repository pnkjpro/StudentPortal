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
       
        <div class="row">
             @if(session()->has('message'))
                <div class="alert alert-success mt-3"><strong>{{session('message')}} <i class="fas fa-circle-check"></i></strong></div>
            @endif
        <div class="col-md-6">
            <a href="{{ route('create.candidate') }}" class="btn btn-primary mt-3 mb-2">Create Registration</a>
        </div>
        <div class="col-md-6">
            <form action="{{route('monthlyCands')}}" method="GET">
                @csrf
                <select id="monthSelect" class="form-control text-center mt-3 mb-2" name="month" onchange="this.form.submit()">
                    <option selected>Select Month</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </form>
        </div>
    </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card-fin">
                        <h3 class="card-header"> Enrolled Candidate</h3>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Roll No.</th>
                                            <th>Admission Date</th>
                                            <th>Name  {{count($cands)}}</th>
                                            <th>Fee Paid</th>
                                            <th>Reward</th>
                                            <!--<th>Father's Name</th>-->
                                            <!--<th>Gender</th>-->
                                            <!--<th>Date of Birth</th>-->
                                            <!--<th>Mobile No.</th>-->
                                            <!--<th>Course</th>-->
                                            <th>Candidate Type</th>
                                            <!--<th>Address</th>-->
                                            <!--<th>Certificate No.</th>-->
                                            <th class="text-center" colspan="3">Action</th>
                                            <th>Certificate</th>
                                        </tr>
                                    </thead>
                                    <tbody id="recordTableBody">
                                        @foreach($cands as $cand)
                                        @if($cand->mode != 'archive')
                                            <tr>
                                                <td>{{ $cand->studentID }}</td>
                                                <td>{{ date('d F', strtotime($cand->admissionDate)) }}</td>
                                                <td>{{ $cand->name }}</td>
                                                <td> &#8377 {{ \App\Models\FeeRecord::where('candreg_id', $cand->id)
                                                          ->sum('feeAmount') }}</td>
                                                <td>&#8377 {{ count(\App\Models\Candreg::where('referBy', $cand->studentID)->get())*500 }}</td>
                                                <!--<td>{{ $cand->pname }}</td>-->
                                                <!--<td>{{ $cand->gender }}</td>-->
                                                <!--<td>{{ $cand->birthDate }}</td>-->
                                                <!--<td>{{ $cand->phoneNumber }}</td>-->
                                                <!--<td style="text-transform:uppercase;">{{ $cand->course }}</td>-->
                                                <td>
                                                    <form action="{{route('updateStatus')}}" method="GET">
                                                        @csrf
                                                        <input type="hidden" name="candreg_id" value="{{ $cand->id }}">
                                                        <select name="status" class="form-select" onchange="this.form.submit()">
                                                            <option>Select</option>
                                                            <option {{($cand->status == 'regular') ? 'selected' : '' }} value="regular">Regular</option>
                                                            <option {{($cand->status == 'discounted') ? 'selected' : '' }} value="discounted">Discounted</option>
                                                        </select>
                                                    </form>
                                                </td>
                                                <!--<td>{{ $cand->address }}</td>-->
                                                <!--<td>{{ $cand->certNumber }}</td>-->
                                                <td>
                                                    <form action="{{route('createFeeRecord')}}" method="GET">
                                                        @csrf
                                                        <input type="hidden" name="candreg_id" value="{{ $cand->id }}">
                                                        <button class="btn btn-primary">Collect Fee</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{route('verifyFee')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="studentID" value="{{ $cand->studentID }}">
                                                        <button type="submit" class="btn btn-success">Fee Details</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ route('editCandidate') }}" method="GET">
                                                        @csrf
                                                        <input type="number" name="id" value="{{ $cand->id }}" hidden>
                                                        <button class="btn btn-warning">Edit</button>
                                                    </form>
                                                </td>
                                                @if(!isset($cand->certNumber))
                                                <td>
                                                    <form action="{{ route('issue.candidate') }}" method="GET">
                                                        @csrf
                                                        <input type="text" name="studentID" value="{{ $cand->studentID }}" hidden>
                                                        <button class="btn btn-info text-white">Issue</button>
                                                    </form>
                                                </td>
                                                @else
                                                <td>{{$cand->certNumber}}</td>
                                                @endif
                                                <td>
                                                    <form id="archiveForm{{ $cand->id }}" action="{{ route('candArchive') }}" method="POST">
                                                        @csrf
                                                        <input type="number" name="id" value="{{ $cand->id }}" hidden>
                                                        <button type="button" class="btn btn-danger" onclick="confirmArchive({{ $cand->id }})">Archive</button>
                                                    </form>
                                                </td>
                                                <!--<td>-->
                                                <!--    <form id="deleteForm{{ $cand->id }}" action="{{ route('candDelete') }}" method="POST">-->
                                                <!--        @csrf-->
                                                <!--        <input type="number" name="id" value="{{ $cand->id }}" hidden>-->
                                                <!--        <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $cand->id }})">Delete</button>-->
                                                <!--    </form>-->
                                                <!--</td>-->
                                            </tr>
                                        @endif
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
    
    <!-- ===========================================================================================  -->
    <script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this candidate?')) {
            document.getElementById('deleteForm' + id).submit();
        }
    }
    function confirmArchive(id) {
        if (confirm('Are you sure you want to archive this candidate?')) {
            document.getElementById('archiveForm' + id).submit();
        }
    }
</script>
    
    
@endsection

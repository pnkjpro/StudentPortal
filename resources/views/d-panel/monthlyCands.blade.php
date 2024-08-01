@php
if (empty(session('user_id'))){
    header("Location: /login");
    exit();
}


$harsh = $cands->where('splitStatus', 'harsh')->sum('feeAmount');
$pankaj = $cands->where('splitStatus', 'pankaj')->sum('feeAmount');
if($harsh>$pankaj){
    $dueSplited = 'Harsh will pay: ' . ($harsh - $pankaj)/2;
}
elseif($pankaj>$harsh){
    $dueSplited = 'Pankaj will pay: ' . ($pankaj-$harsh)/2;
}
else{
    $dueSplited = 'All settled between both parties';
}

@endphp
@extends('dashboard')

@section('content')
<style>
    /* Styles for the popup */
    .popup-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
    }

    .popup-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
</style>
    <!-- ===========================================================================================  -->
    <div class="container">
            <div class="row">
        <div class="col-md-6">
            <a href="{{ route('create.candidate') }}" class="btn btn-primary mt-3 mb-2">Create Registration</a>
        </div>
        <div class="col-md-6">
            <form action="{{route('monthlyCands')}}" method="GET">
                @csrf
                <select id="monthSelect" class="form-control text-center btn-primary mt-3 mb-2" name="month" onchange="this.form.submit()">
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
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12">
                    <div class="card-fin">
                        
                         <div class="alert alert-success mt-3"><strong>{{ $dueSplited }} <i class="fas fa-circle-check"></i></strong></div>
                        
                        <h3 class="card-header"> Enrolled Candidate</h3>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Roll No.</th>
                                            <th>Name</th>
                                            <th>Fee Date</th>
                                            <th>Amount {{$cands->sum('feeAmount')}}</th>
                                            <!--<th>Comment</th>-->
                                            <th>Mobile No.</th>
                                            <th>Course</th>
                                            <th>Split Status</th>
                                            <th>Action</th>
                                            <th>Comment</th>
                                        </tr>
                                    </thead>
                                    <tbody id="recordTableBody">
                                        @foreach($cands as $cand)
                                           <tr>
                                               <td>{{$cand->candreg->studentID}}</td>
                                               <td>{{$cand->candreg->name}}</td>
                                               <td>{{date('d F', strtotime($cand->feeDate))}}</td>
                                               <td>&#8377 {{$cand->feeAmount}}</td>
                                               <!--<td>{{$cand->comment}}</td>-->
                                               <td>{{$cand->candreg->phoneNumber}}</td>
                                               <td style="text-transform:uppercase;">{{$cand->candreg->course}}</td>
                                               <td>
                                                   <form action="{{route('feeSplit')}}" method="POST">
                                                       @csrf
                                                       <input type="hidden" name="feeRecord_id" value="{{$cand->id}}">
                                                       <select name="splitStatus" class="form-control" onchange="this.form.submit()">
                                                           <option value="pankaj" {{ $cand->splitStatus == 'pankaj' ? 'selected' : '' }}>Pankaj</option>
                                                           <option value="harsh" {{ $cand->splitStatus == 'harsh' ? 'selected' : '' }}>Harsh</option>
                                                           <option value="splited" {{ $cand->splitStatus == 'splited' ? 'selected' : '' }}>Splited</option>
                                                       </select>
                                                   </form>
                                               </td>
                                               <td>
                                                    <form action="{{route('createFeeRecord')}}" method="GET">
                                                        @csrf
                                                        <input type="hidden" name="candreg_id" value="{{ $cand->candreg->id }}">
                                                        <button class="btn btn-primary">Collect Fee</button>
                                                    </form>
                                                </td>
                                               @if(isset($cand->comment)) 
                                                <td>
                                                    <button class="btn btn-primary" onclick="showCommentPopup('{{$cand->comment}}')">View Comment</button>
                                                </td>
                                               
                                                @endif
                                           </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                                <div class="popup-overlay" id="popup">
                                    <div class="popup-content" id="popupContent"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{$cands->onEachSide(1)->links()}}
    </div>
    
    <!-- ===========================================================================================  -->
    <script>
    function showCommentPopup(comment) {
        // Get the popup and popup content elements
        var popup = document.getElementById('popup');
        var popupContent = document.getElementById('popupContent');

        // Set the comment as the content of the popup
        popupContent.textContent = comment;

        // Show the popup
        popup.style.display = 'flex';
    }

    // Close the popup when clicking outside of it
    window.onclick = function(event) {
        var popup = document.getElementById('popup');
        if (event.target == popup) {
            popup.style.display = "none";
        }
    }
</script>

@endsection

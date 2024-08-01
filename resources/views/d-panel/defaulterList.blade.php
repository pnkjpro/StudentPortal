@php
if (empty(session('user_id'))){
    header("Location: /login");
    exit();
}
use App\Models\FeeRecord;
use App\Models\Candreg;

$defaulters = Candreg::with('fee_records')->where('session', 2)->get();

@endphp
@extends('dashboard')

@section('content')
<style>

    .highlight {
        background-color: red; /* Change to your desired highlight color */
        color:red;
        font-weight: 900 !important;
    }
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
    <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12">
                    <div class="card-fin">
                        <h3 class="card-header"> Defaulters List</h3>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Roll No.</th>
                                            <th>Name</th>
                                            <th>Last Date</th>
                                            <th>Penalty Day</th>
                                            <th>Paid</th>
                                            <th>Reward</th>
                                            <th>Collect Fee</th>
                                        </tr>
                                    </thead>
                                    <tbody id="recordTableBody">
                                        @foreach($defaulters as $defaulter)
                                            
                                            @php
                                                if($defaulter->fee_records->isNotEmpty()){
                                                $dayDiff = $defaulter->fee_records->last()->feeDate->diffInDays(now());
                                                $creditDay = 28 - $dayDiff;
                                                }
                                            @endphp
                                            
                                            @if ($defaulter->fee_records->isNotEmpty() && $creditDay < 0 && $defaulter->mode != 'archive')
                                           <tr>
                                               <td>{{$defaulter->studentID}}</td>
                                               <td>{{$defaulter->name}}</td>
                                               <td> {{date('d F', strtotime($defaulter->fee_records->last()->feeDate))}}</td>
                                               <!--<td>{{ $dayDiff }} days ago</td>-->
                                               <td class="@if($creditDay < 0) highlight @endif">{{ $creditDay }} days</td>
                                               <td>
                                                    {{$totals = $defaulter->fee_records->sum('feeAmount')}}
                                                </td>
                                                <td>
                                                    {{count(Candreg::where('referBy', $defaulter->studentID)->get())*500}}
                                                </td>
                                                <td>
                                                    <form action="{{route('createFeeRecord')}}" method="GET">
                                                        @csrf
                                                        <input type="hidden" name="candreg_id" value="{{ $defaulter->id }}">
                                                        <button class="btn btn-primary">Collect Fee</button>
                                                    </form>
                                                </td>
                                           </tr>
                                           @endif
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

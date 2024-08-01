@php
if (empty(session('user_id'))){
    header("Location: /login");
    exit();
}
$cands = \App\Models\AwarenessForm::all();

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
        <div class="container mt-1">
            <a href="{{ route('create.candidate') }}" class="btn btn-primary text-right mt-3 mb-2">Create Registration</a>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12">
                    <div class="card-fin">
                        <h3 class="card-header"> Awareness Records</h3>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                             <th>Candidate Name</th>
                                             <th>Mobile No.</th>
                                             <th>Course</th>
                                             <th>Description</th>
                                             <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="recordTableBody">
                                        @foreach($cands as $cand)
                                        <tr>
                                            
                                            <td>{{ $cand->name }}</td>
                                            <td>{{ $cand->mobile }}</td>
                                            <td>{{ $cand->course }}</td>
                                             
                                            <td>
                                                @if(isset($cand->description))
                                                <button class="btn btn-primary" onclick="showCommentPopup('{{$cand->description}}')">View Description</button>
                                                @endif
                                            </td>
                                            
                                            <td>
                                                <a class="btn btn-success" href="tel:{{ $cand->mobile }}"> Call </a>
                                            </td>
                                            
                                            <td>
                                                @if($cand->status == 'unfollowed')
                                                <form action="{{ route('follow.awareness') }}" method="POST">
                                                    @csrf
                                                    <input type="number" name="id" value="{{ $cand->id }}" hidden>
                                                    <button class="btn btn-success">Follow</button>
                                                </form>
                                                @else
                                                    <button class="btn btn-disabled">Followed</button>
                                                @endif
                                                
                                            </td>
                                            <td>
                                                <form id="deleteForm{{ $cand->id }}" action="{{ route('delete.awareness') }}" method="POST">
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
            
        </div>
    </div>
    
    <!-- ===========================================================================================  -->
    
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
    
    
    
    <script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this candidate?')) {
            document.getElementById('deleteForm' + id).submit();
        }
    }
</script>
@endsection

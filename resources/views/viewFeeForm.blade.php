<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Logic Era | IT Training, Development & Consultancy</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('layouts.css')
</head>

<body class="rbt-header-sticky">

    <!-- Start Header Area -->
    @include('layouts.header')
    <!-- Mobile Menu Section -->
    @include('layouts.popup-mobile-menu')
    <!-- Start Side Vav -->
    <!-- End Side Vav -->
    <!-- <a class="close_side_menu" href="javascript:void(0);"></a> -->

    <div class="rbt-conatct-area">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 sal-animate" data-sal="slide-up" data-sal-delay="200" data-sal-duration="800">
                    <!-- it starts here -->
                        
                        <div class="rbt-contact-form contact-form-style-1 max-width-auto mb-5">
                        <div class="section-title text-start">
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
                            <span class="subtitle bg-primary-opacity">Get Your Fee Details</span>
                        </div>
                        <form method="POST" action="{{route('verifyFee')}}">
                            @csrf
                                <label>Student ID</label>
                                <input name="studentID" type="text" placeholder="Enter your StudentID" required>
                                <input name="submit" type="submit" value="Get Your Fee Details">
                        </form>
                        <p class="text-danger pt-5 fw-bold">@if (isset($error))
                            {{$error}}
                            @endif</p>
                    </div>
                    <!-- It ends here -->
                    
                    <!-- ====================================== Table Starts Here=============================== -->
                    @if(isset($feeDetails))
                    <div class="section-title text-start">
                        <span class="subtitle bg-primary-opacity" style="text-transform:capitalize">{{$candidate->status}} Candidate</span>
                    </div>
                        <table class="mb-5">
                            <h4 class="title">{{$candidate->name}}</h4>
                            <thead>
                                <tr class="text-success">
                                    <th><strong>Fee Date</strong></th>
                                    <th><strong>Fee Amount</strong></th>
                                    <th><strong>Status</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($feeDetails as $feeDetail)
                                <tr>
                                    <td>{{ date('d F Y', strtotime($feeDetail->feeDate)) }}</td>
                                    <td>{{$feeDetail->feeAmount}}</td>
                                    <td>{{$feeDetail->feeType}}</td>
                                </tr>
                                @endforeach
                                <tr class="text-primary">
                                    <td><strong>Total Fee Paid</strong></td>
                                    <td><strong>{{$feeDetails->sum('feeAmount')}}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    
                    <!-- ====================================== Table Ends Here ================================ -->
                    
                    <!-- ======================================== Discount Table =============================== -->
                    <table>
                        <thead>
                            <tr class="text-success">
                                <th><strong>Admission Date</strong></th>
                                <th><strong>Person Referred</strong></th>
                                <th><strong>Referral Reward</strong></th>
                            </tr>
                            @foreach($referals as $referal)
                                <tr>
                                    <td>{{date('d F Y', strtotime($referal->admissionDate))}}</td>
                                    <td>{{$referal->name}}</td>
                                    <td>Rs 500</td>
                                </tr>
                            @endforeach
                            <tr class="text-primary">
                                <td colspan="1"></td>
                                <td><strong>Total Referal Amount</strong></td>
                                <td><strong>Rs {{count($referals)*500}}</strong></td>
                            </tr>
                        </thead>
                    </table>
                    
                    <!-- ======================================== Discount Table Ends here ===================== -->
                    @endif
                </div>
            </div>
        </div>
    </div>
@include('layouts.js')
</body>

</html>
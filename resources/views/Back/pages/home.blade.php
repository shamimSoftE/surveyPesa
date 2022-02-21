@extends('Back.master')

@section('title', 'Home')

@section('content')
<div class="layout-px-spacing">

    @if(auth()->user()->type == 'admin')
        <div class="row layout-top-spacing">

            {{-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing" >
                <div class="card bg-success text-white">
                    <div class="card-body">Current Balance  <br><span>Kshs {{ number_format(auth()->user()->balance , 2) }}</span></div>
                </div>
            </div> --}}

            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card bg-warning text-white">
                    @php
                        $Withdraw = \App\Models\Withdraw::where('status','Completed')->latest()->get();
                    @endphp
                    <div class="card-body">
                        Withdraw Completed <span style="font-size: 20px"> ({{ $Withdraw->count()  }})</span>
                        <a href="{{ route('withdraw_completed') }}" class="btn btn-sm btn-danger ml-1 float-right" title="Show List">View</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card bg-danger text-white">
                    @php
                        $Withdraw = \App\Models\Withdraw::where('status','Pending')->latest()->get();
                    @endphp
                    <div class="card-body">
                        Withdraw Pending <span style="font-size: 20px"> ({{ $Withdraw->count()  }})</span>
                        <a href="{{ route('withdraw_request') }}" class="btn btn-sm btn-dark ml-1 float-right" title="Show List">View</a>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card bg-dark text-white">
                    @php
                        $userAns = \App\Models\UserAnswer::latest()->get();
                    @endphp
                    <div class="card-body">
                        Survey Question Ans<span style="font-size: 20px"> ({{ $userAns->count()  }})</span>
                        <a href="{{ route('ans_servey') }}" class="btn btn-sm btn-warning ml-1 float-right" title="Show List">View</a>
                    </div>
                </div>
            </div>

            {{-- <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-two">



                    <div class="widget-heading">
                        <h5 style="color: rgba(146,2,82,0.82)">


                        </h5>
                        <a href="" class="btn btn-sm btn-info ml-1" title="Show List">View</a>
                    </div>
                </div>
            </div> --}}

        </div>
    @else

        <div class="row layout-top-spacing">

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

                <div class="widget widget-account-invoice-three">

                    <div class="widget-heading">
                        <div class="wallet-usr-info">
                            <div class="usr-name">
                                <span>
                                    @if(!empty( auth()->user()->avatar))
                                        <img src="{{ asset('Back/images/user/'. auth()->user()->avatar) }}" alt="admin-profile" class="img-fluid">
                                    @else
                                        <img src="{{ asset('all-source') }}/assets/img/90x90.jpg" alt="admin-profile" class="img-fluid">
                                    @endif
                                    {{ auth()->user()->name }}
                                    </span>
                            </div>
                            <div class="add">
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></span>
                            </div>
                        </div>
                        <div class="wallet-balance">
                            <p>Wallet Balance</p>
                            <h5 class=""><span class="w-currency">Kshs</span> {{ number_format(auth()->user()->balance) }}</h5>
                        </div>
                    </div>

                    <div class="widget-content">

                        <div class="bills-stats">
                            <span>Pending</span>
                        </div>

                        <div class="invoice-list">

                            <div class="inv-detail">
                                @foreach ($pendingAmounts as $key => $amount)
                                    <input type="hidden" value="{{ ++$key }}">

                                    <div class="info-detail-1" >
                                        <p>From {{ $amount->created_at->diffForHumans() }}</p>
                                        <p><span class="w-currency">Kshs</span> <span class="bill-amount">{{ number_format($amount->amount) }}</span></p>
                                    </div>
                                    @if($key >= 3)
                                    @break
                                @endif

                                @endforeach
                            </div>

                            <div class="inv-action">
                                <a href="{{ route('withdraw_page') }}" class="btn btn-outline-primary view-details">View Details</a>
                                <a href="{{ route('withdraw_page') }}" class="btn btn-outline-primary pay-now">Withdraw More</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-two">

                    <div class="widget-heading">
                        <h5 class="">Your Payment Histore</h5>
                    </div>

                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><div class="th-content">Time/Date</div></th>
                                        <th><div class="th-content th-heading">Amount</div></th>
                                        <th><div class="th-content">Status</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($withdraw as $with)
                                        <tr>
                                            <td><div class="td-content product-invoice">{{ $with->created_at->diffForHumans() }}</div></td>
                                            <td><div class="td-content pricing"><span class="">Kshs.{{ number_format($with->amount) }}</span></div></td>
                                            @if($with->status == 'Pending')
                                                <td><div class="td-content"><span class="badge badge-danger">{{ $with->status }}</span></div></td>
                                                @else
                                                <td><div class="td-content"><span class="badge badge-success">{{ $with->status }}</span></div></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row layout-top-spacing">

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-account-invoice-three">
                    <div class="widget-heading" style="padding-top: 65px;">
                        <strong style="font-size: 19px;color:white">Invite a friend and get Kshs.150 </strong>
                        <div class="wallet-balance">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#staticBackdrop" class="btn btn-info" style="background: #380c37;border: 1px solid #380c37; float: right;">
                                Get Invite Link
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right">
                                    <polyline points="13 17 18 12 13 7"></polyline>
                                    <polyline points="6 17 11 12 6 7"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
            </div>



            <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Your Reference ID</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control" value="{{ url('/'.'referral_campaign/'.auth()->user()->id.'?referral_inviter?') }}" id="myInput">
                        </div>
                        <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                        <button type="button" class="btn btn-primary" onclick="myFunction()" onmouseout="outFunc()">Copy This</button>
                        </div>
                    </div>
                    </div>
                </div>

                <script>
                    function myFunction() {
                    var copyText = document.getElementById("myInput");
                    copyText.select();
                    copyText.setSelectionRange(0, 99999);
                    navigator.clipboard.writeText(copyText.value);

                    var tooltip = document.getElementById("myTooltip");
                    tooltip.innerHTML = "Copied: " + copyText.value;
                    }

                    function outFunc() {
                    var tooltip = document.getElementById("myTooltip");
                    tooltip.innerHTML = "Copy to clipboard";
                    }
                    </script>




            <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-two">

                    @php
                        $refer_users = \App\Models\Refer::where('reference_by', auth()->user()->id)->get();
                    @endphp

                    <div class="widget-heading">
                        <span class="text-center text-primary">Refer at least 15 people to Withdraw</small>
                        <h5 class="float-right text-danger">Total User {{ $refer_users->count() }} /<span class="text-success" title=" You need to refer 15 people to withdraw">15</span></h5>
                    </div>
                    <div class="widget-heading">
                        <h5 class="">Your Latest Invited Success User</h5>
                    </div>


                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><div class="th-content">ID</div></th>
                                        <th><div class="th-content">Name</div></th>
                                        <th><div class="th-content">Phone Number</div></th>
                                        <th><div class="th-content">Joined Time</div></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($refer_users as $refer)
                                        @php
                                            $invited_user = \App\Models\User::where('id', $refer->invited_user_id)->get();
                                        @endphp
                                        @foreach ($invited_user as $user_in)
                                            <tr>
                                                <td><div class="td-content pricing"><span>{{ $user_in->id }}</span></div></td>
                                                <td><div class="td-content customer-name">{{ $user_in->name }}</div></td>
                                                <td><div class="td-content pricing">{{ $user_in->phone_number }}</div></td>
                                                <td><div class="td-content pricing"><span class="">
                                                    {{ $user_in->created_at->diffForHumans() }}
                                                </span></div></td>
                                            </tr>

                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

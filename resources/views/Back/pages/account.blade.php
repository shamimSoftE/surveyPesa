@extends('Back.master')
@section('title', 'Withdraw')
@section('content')

<div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            {{-- display success message--}}
            @if(Session::has('sms'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('sms') }}</strong>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{--===========  display error message ==============--}}
            @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('error') }}</strong>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <h5>Withdrawal Summary</h5>
                    <br>
                </div>
            </div>
            <div class="row withdraw_desh" >
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="card bg-success text-white">
                        <div class="card-body">Current Balance  <br><span>Kshs {{ number_format(auth()->user()->balance , 2) }}</span></div>
                    </div><br>
                </div>

                <div class=" col-md-4 col-sm-6 col-12">
                    <div class="card bg-dark text-white">
                        <div class="card-body">Withdraw Complete <br><span>Kshs {{ number_format($withdrawComplete, 2) }}</span></div>
                    </div><br>
                </div>
                <div class=" col-md-4 col-sm-6 col-12">
                    <div class="card bg-danger text-white">
                        <div class="card-body">Withdraw Panding <br><span>Kshs {{ number_format($withdrawPending, 2) }}</span></div>
                    </div><br>
                </div>

                {{-- @php($max_withdraw_amount = $orders_completed_sum-( $withdraw_success + $withdraw_panding)) --}}

            </div>
            <hr>
        </div>

        <div class="col-12">
            <h5>Withdraw History</h5>
            <br>
        </div>
        <div class="offset-1 col-xl-10 col-md-10 col-sm-10 col-10">
            <div class="widget-content widget-content-area br-6">

                <table id="zero-config" class="table dt-table-hover" style="width:100%">

                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i = 1)

                    @foreach (\App\Models\Withdraw::all() as $gwd)
                        @php($timeStamp = date( "d-M-Y", strtotime($gwd->created_at)))
                        {{-- @php($timeStamp = date( "d-M-Y h:i:s A", strtotime($gwd->created_at))) --}}

                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $timeStamp }}</td>
                            <td> Kshs {{ number_format($gwd->amount, 2) }} </td>
                            <td>
                                @if ($gwd->status == 'Pending')
                                    <strong class=" text-danger"  title="Complete">Pending </strong>
                                @else
                                    <strong class=" text-success" title="Pending">  Complete </strong>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection

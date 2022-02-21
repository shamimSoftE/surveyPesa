@extends('Back.master')

@section('title')
    Withdrawal Completed
@endsection

@section('content')

    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>User Name</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th class="no-content">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach ($withdrawCompleted as $wdP)
                                @php($timeStamp = date( "d-M-Y", strtotime($wdP->created_at)))
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $wdP->user->name }}</td>
                                    <td>{{ $timeStamp }}</td>
                                    <td>Kshs {{ number_format($wdP->amount, 2) }}</td>
                                    <td>
                                        @if ($wdP->status == 'Pending')
                                            <strong class=" text-danger"  title="Complete">Pending </strong>
                                        @else
                                            <strong class=" text-success" title="Pending">  Completed </strong>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($wdP->status == 'Pending')
                                            <a title="Click To Completed" href="{{ route('withdraw_status',$wdP->id) }}" class="td-content"><span class="badge badge-danger">Pending</span></a>
                                        @else
                                            <a href="#" class="td-content"><span class="badge badge-success">Completed</span></a>
                                        @endif
                                        {{-- <a href="{{ route('withdraw_delete',$wdP->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel">
                                                <circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line>
                                                <line x1="9" y1="9" x2="15" y2="15"></line>
                                            </svg>
                                        </a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl</th>
                                <th>User Name</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>

    </div>


@endsection



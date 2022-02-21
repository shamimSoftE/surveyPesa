@extends('Back.master')

@section('title','Withdraw Secound Step')

@section('content')

<div id="flStackForm" class="offset-2 col-lg-8 layout-spacing layout-top-spacing" style="height: 500px">
    <div class="statbox widget box box-shadow" style="box-shadow: 0px -2px 20px 5px;">

        <div class="row">
            <div class="col-12">
                <h5>Balance Withdraw</h5>
                <h5 style="color: #f013ff!important;" class="text-center">Totall Balance Kshs.{{ number_format(auth()->user()->balance) }}</h5>
                <hr/>
            </div>
        </div>
        {{--<div class="widget-content widget-content-area">--}}
        <div class="offset-1 col-xl-10 col-md-10 col-sm-10 col-10">

            <form method="get" action="{{ route('withdraw_request_user_two') }}" >
                @csrf

                <div class="row">
                    <div class="offset-1 col-md-10">
                        <div class="form-group">
                            <label title="MPesa Account Number">
                            Amount You Want To Withdraw <sup style="color:red;" title="Must fill out this">*</sup>
                            </label>
                            <input  type="hidden" class="form-control" name="phone_number" value="{{ $phone_number }}">
                            <input  type="number" class="form-control" name="amount" value="{{ old('amount') }}" min="100" max="{{auth()->user()->balance }}" placeholder="How much you want to withdraw" >
                            @error('amount')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="offset-1 col-md-10">
                        <input type="submit" class="btn btn-lg btn-success mt-4" style="float: right" value="Next" >
                    </div>
                </div>


            </form>
        </div>
    </div>

</div>


@endsection

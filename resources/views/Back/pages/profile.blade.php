@extends('Back.master')

@section('title','Profile')

@section('content')

    <div class="layout-px-spacing">

        <div class="account-settings-container layout-top-spacing">

            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100" style="background: white;box-shadow: 0px 5px 9px 5px;">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">

                            {{-- display error message --}}
                            @if(Session::has('sms'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ Session::get('sms') }}</strong>.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            {{-- //display error message --}}

                            <form id="general-info" class="section general-info" method="post" action="{{ route('profile_update',$user) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="info">
                                    <h5 class="text-center text-primary" style="margin-top: revert;font-family: emoji;font-size: 23px;">
                                        @if (!empty($user->name))
                                        <strong>{{ $user->name }}</strong>,
                                        @endif Here you can customize your information.<sup><small>(if you want)</small></sup>
                                        <hr/>
                                    </h5>
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-12 col-md-4">
                                                    <div class="upload mt-4 pr-md-4">
                                                        @if ($user->avatar)
                                                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Old Image</p>
                                                            <img src="{{ asset('Back/images/user/'.$user->avatar) }}" alt="Avatar" style="height: 110px; width: 116px;margin-bottom: 5px;">
                                                        @endif
                                                        <input type="file" accept="image/*" name="avatar" class="form-control-file" data-max-file-size="1M" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="fullName">Your Name</label>
                                                                    <input type="text" name="name" class="form-control mb-4" value="{{ $user->name }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="fullName">Your E-mail</label>
                                                                    <input type="text" name="email" class="form-control mb-4" value="{{ $user->email }}">
                                                                </div>
                                                                @error('email')
                                                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="fullName">Phone Number</label>
                                                                    <input type="text" class="form-control mb-4" name="phone_number" value="{{ $user->phone_number }}">
                                                                </div>
                                                                @error('phone_number')
                                                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="fullName">Create a new password <sup style="color: darkred" title="If you don't want to change your password, Just skip this field">(..?)</sup></label>
                                                                    <input type="password" class="form-control mb-5" name="password">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-success float-right"> Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection





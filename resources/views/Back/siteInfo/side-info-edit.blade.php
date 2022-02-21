@extends('Back.master')

@section('title')
    Site Info Edit
@endsection


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
                {{-- display success message--}}
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h5>Site-Info-Edit</h5>
                        <br/>
                        {{-- <a class="btn btn-dark float-right mb-3" href="{{ route('site.index') }}">
                            <i class="fas fa-list"></i> Site-Info-List
                        </a> --}}
                    </div>
                </div>
            </div>
            {{--<div class="widget-content widget-content-area">--}}
            <div class="offset-1 col-xl-10 col-md-10 col-sm-10 col-10">
                <form action="{{ route('site.update',$site) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Site Name</label>
                                <input type="text" class="form-control" name="site_name"  value="{{ $site->site_name }}">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Site Address</label>
                                <input type="text" class="form-control" name="address"  value="{{ $site->address }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">FaceBook</label>
                                <input type="text" class="form-control" name="facebook"  value="{{ $site->facebook }}">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Linkedin</label>
                                <input type="text" class="form-control" name="linkedin"  value="{{ $site->linkedin }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Instagram</label>
                                <input type="text" class="form-control" name="instagram"  value="{{ $site->instagram }}">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Youtube</label>
                                <input type="text" class="form-control" name="youtube"  value="{{ $site->youtube }}">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Twitter</label>
                                <input type="text" class="form-control" name="twitter"  value="{{ $site->twitter }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Contact Number</label>
                                <input type="text" class="form-control" name="contact_number"  value="{{ $site->contact_number }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Bkash Merchant Number</label>
                                <input type="text" class="form-control" name="b_merchant_number"  value="{{ $site->b_merchant_number }}">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Nagad Merchant Number</label>
                                <input type="text" class="form-control" name="n_merchant_number"  value="{{ $site->n_merchant_number }}">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Rocket Merchant Number</label>
                                <input type="text" class="form-control" name="r_merchant_number"  value="{{ $site->r_merchant_number }}">
                            </div>
                        </div>



                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">E-CAB ID</label>
                                <input type="text" class="form-control" name="e_cab"  value="{{ $site->e_cab }}">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">BIN ID</label>
                                <input type="text" class="form-control" name="bin"  value="{{ $site->bin}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Hot Line Number</label>
                                <input type="text" class="form-control " name="hot_number"  value="{{ $site->hot_number }}">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">E-mail</label>
                                <input type="text" class="form-control" name="email"  value="{{ $site->email }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Why Chose Us <sup style="color:red;">(optional)</sup></label>
                                <textarea name="wcu" class="form-control" cols="30" >
                                    {{ $site->wcu }}
                                </textarea>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Site Logo Preview</label>
                                <img src="{{ asset("Back/images/logo/".$site->logo) }}" height="50px" style="background-color: black" alt="site-logo">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Site Logo</label>
                                <input type="file" class="form-control-file" name="logo" accept="image/*">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Url Logo Preview</label>
                                <img src="{{ asset("Back/images/logo/".$site->url_logo) }}" height="50px" style="background-color: black" alt="site-logo">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Url Logo</label>
                                <input type="file" class="form-control-file" name="url_logo" accept="image/*">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </form>
            </div>
            {{-- </div>--}}
        </div>
    </div>

@endsection

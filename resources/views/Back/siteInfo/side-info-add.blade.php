@extends('Back.master')

@section('title')
    Site Info Add
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
                        <h5>Site-Info-Generate</h5>
                        <a class="btn btn-sm float-right mb-3" href="{{ route('site.index') }}">
                            <i class="fas fa-list"></i> Site-Info-List
                        </a>
                    </div>
                </div>
            </div>
            {{--<div class="widget-content widget-content-area">--}}
            <div class="offset-1 col-xl-10 col-md-10 col-sm-10 col-10">
                <form action="{{ route('site.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Site Name<sup style="color:red;" title="Must fill out this">*</sup></label>
                                <input type="text" class="form-control @error('site_name') is-invalid @enderror" name="site_name"  placeholder=" site name">
                            </div>
                            @error('site_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Site Address<sup style="color:red;" title="Must fill out this">*</sup></label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"  placeholder=" site address">
                            </div>
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Facebook<sup style="color:red;" title="Must fill out this">*</sup></label>
                                <input type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook"  placeholder=" facebook link">
                            </div>
                            @error('facebook')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Twitter<sup style="color:red;">(optional)</sup></label>
                                <input type="text" class="form-control " name="twitter"  placeholder="twitter link">
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Linkedin<sup style="color:red;">(optional)</sup></label>
                                <input type="text" class="form-control " name="linkedin"  placeholder=" linkedin link">
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Instagram<sup style="color:red;">(optional)</sup></label>
                                <input type="text" class="form-control" name="instagram"  placeholder=" instagram link">
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">YouTube<sup style="color:red;">(optional)</sup></label>
                                <input type="text" class="form-control" name="youtube"  placeholder=" youtube link">
                            </div>

                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Contact Number<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number"  placeholder=" contact_number">
                            </div>
                            @error('contact_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Bkash Merchant Number<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control @error('b_merchant_number') is-invalid @enderror" name="b_merchant_number"  placeholder=" bkash merchant number ">
                            </div>
                            @error('b_merchant_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Nagad Merchant Number<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control @error('n_merchant_number') is-invalid @enderror" name="n_merchant_number"  placeholder="Nagad merchant number ">
                            </div>
                            @error('n_merchant_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Rocket Merchant Number<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control @error('r_merchant_number') is-invalid @enderror" name="r_merchant_number"  placeholder=" bkash merchant number ">
                            </div>
                            @error('r_merchant_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">E-CAB ID<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control @error('e_cab') is-invalid @enderror" name="e_cab"  placeholder="E-CAB ID ">
                            </div>
                            @error('e_cab')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">BIN Number<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control @error('bin') is-invalid @enderror" name="bin"  placeholder="Bin ID ">
                            </div>
                            @error('bin')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>







                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Hot Line Number <sup style="color:red;">(optional)</sup></label>
                                <input type="text" class="form-control " name="hot_number"  placeholder=" Hot Line Number ">
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Why Chose Us <sup style="color:red;">(optional)</sup></label>
                                <textarea name="wcu" class="form-control" cols="30" ></textarea>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Site E-mail<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"  placeholder=" email link">
                            </div>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Site Logo<sup style="color:red;" title="Must fill out this">*</sup></label>
                                <input type="file" class="form-control-file" name="logo" accept="image/*">
                            </div>
                            @error('logo')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Url Logo<sup style="color:red;" title="Must fill out this">*</sup></label>
                                <input type="file" class="form-control-file" name="url_logo" accept="image/*">
                            </div>
                            @error('logo')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            {{-- </div>--}}
        </div>
    </div>

@endsection

@extends('Back.master')

@section('title', 'Admins')

@section('content')

<div class="layout-px-spacing">

    <div class="account-settings-container layout-top-spacing">

        <div class="account-content">
            <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100" style="background: white;box-shadow: 0px 5px 9px 5px;">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">

                        <form id="general-info" class="section general-info" method="post" action="{{ route('admin_register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="info">
                                <h5 class="text-center " style="margin-top: revert;font-family: emoji;font-size: 23px;">
                                    Create an admin...
                                    <hr/>
                                </h5>
                                <div class="row">
                                    <div class="offset-1 col-lg-10 col-md-10 col-10  mx-auto">

                                        <div class="form">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="fullName">Admin Name</label>
                                                        <input type="text" name="name" class="form-control mb-4" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="fullName">Admin E-mail</label>
                                                        <input type="text" name="email" class="form-control mb-4" value="">
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
                                                        <input type="number" class="form-control mb-4" name="phone_number" value="">
                                                    </div>
                                                    @error('phone_number')
                                                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="fullName">Create a password </label>
                                                        <input type="password" class="form-control mb-5" name="password">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success float-right"> Create</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <hr>
                    <div class="col-12">
                        <h5 class="text-center">Admin List</h5>
                        <br>
                    </div>
                    <div class="offset-1 col-xl-10 col-md-10 col-sm-10 col-10">
                        <div class="widget-content widget-content-area br-6">

                            <table id="zero-config" class="table dt-table-hover" style="width:100%">

                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 1)

                                @foreach ($admins as $admin)
                                    @php($timeStamp = date( "d-M-Y", strtotime($admin->created_at)))

                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->phone_number }}</td>
                                        <td>{{ $timeStamp }}</td>
                                        <td>
                                            <a href="{{ route('admin_delete',$admin->id) }}" class="text-danger btn btn-sm " title="Delete">Delete</a>
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


@endsection

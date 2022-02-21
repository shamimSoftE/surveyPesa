@extends('BackEnd.master')

@section('title')
    Site-Info List
@endsection

@section('content')

    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
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
                <div class="widget-content widget-content-area br-6">
                    <div class="">
                        <a class="btn btn-sm float-right mt-3 mr-4" href="{{ route('site.create') }}">
                            <i class="fas fa-plus-circle"></i> Site Info Add
                        </a>
                    </div>
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">

                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Site Address</th>
                            <th>Facebook </th>
                            <th>Contact Number </th>
                            <th>E-mail</th>
                            <th>Site Logo</th>
                            <th>Twitter </th>
                            <th>Instagram </th>
                            <th>Youtube </th>
                            <th>Linkedin</th>
                            <th>Status</th>
                            <th class="no-content">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($siteInfo as $site)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $site->address }}</td>
                                <td>{{ $site->facebook }}</td>
                                <td>{{ $site->contact_number }}</td>
                                <td>{{ $site->email }}</td>
                                <td>
                                    <a data-toggle="modal" data-target="#viewLogo{{ $site->id }}" title="Click To View">
                                        <img src="{{ asset("Back/images/logo/".$site->logo) }}" height="50px" style="background-color: black" alt="site-logo">
                                    </a>
                                </td>
                                <td>{{ $site->twitter }}</td>
                                <td>{{ $site->instagram }}</td>
                                <td>{{ $site->youtube }}</td>
                                <td>{{ $site->linkedin }}</td>

                                <td>
                                    @if($site->status == '1')
                                        <ul class="form-inline">
                                            <li class="text-success"></li>
                                            Visible
                                        </ul>
                                    @else
                                        <ul class="form-inline">
                                            <li class="text-danger"></li>
                                            Hide
                                        </ul>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn" onclick="event.preventDefault();
                                        if(confirm('Are you really want to delete?')){
                                        document.getElementById('info-delete-{{ $site->id }}').submit()
                                        }">
                                        <span class="fas fa-trash text-danger" title="Destroy"></span>
                                        <form method="post" action="{{ route('site.destroy',$site->id) }}" id="{{ 'info-delete-'.$site->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </a>

                                    @if($site->status == 1)
                                        <a class="btn btn-sm text-success" href="{{ route('site_inactive',$site->id) }}">
                                            <i class="fas fa-arrow-up"></i>
                                        </a>
                                    @else
                                        <a class="btn btn-sm text-danger" href="{{ route('site_active',$site->id) }}">
                                            <i class="fas fa-arrow-down"></i>
                                        </a>
                                    @endif
                                    <a class="btn" data-toggle="modal" data-target="#infoEdit{{ $site->id }}">
                                        <i class="fas fa-pencil-alt" title="Edit"></i>
                                    </a>
                                </td>
                                {{-- modal for view logo --}}
                                <div class="modal fade" id="viewLogo{{ $site->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Logo View</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset("Back/images/logo/".$site->logo) }}" style="background-color: black" alt="site-logo">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- modal --}}

                                <div class="modal fade" id="infoEdit{{ $site->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Site-Info Edit</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('site.update',$site) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group mb-3">
                                                                <label for="name">Site Address</label>
                                                                <input type="text" class="form-control" name="address"  value="{{ $site->address }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group mb-3">
                                                                <label for="name">Facebook</label>
                                                                <input type="text" class="form-control" name="facebook" value="{{ $site->facebook }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group mb-3">
                                                                <label for="name">Instagram</label>
                                                                <input type="text" class="form-control" name="instagram" value="{{ $site->instagram }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group mb-3">
                                                                <label for="name">YouTube</label>
                                                                <input type="text" class="form-control" name="youtube" value="{{ $site->youtube }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group mb-3">
                                                                <label for="name">Linkedin</label>
                                                                <input type="text" class="form-control" name="linkedin" value="{{ $site->linkedin }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group mb-3">
                                                                <label for="name">Contact Number</label>
                                                                <input type="text" class="form-control" name="contact_number" value="{{ $site->contact_number }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group mb-3">
                                                                <label for="name">Site E-mail</label>
                                                                <input type="text" class="form-control" name="email" value="{{ $site->email }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group mb-3">
                                                                <label for="name">Preview Logo</label>
                                                                <img src="{{ asset("Back/images/logo/".$site->logo) }}" height="60px" style="background-color: black" alt="site-logo">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group mb-3">
                                                                <label for="name">Twitter</label>
                                                                <input type="text" class="form-control" name="twitter"  value="{{ $site->twitter }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="name">New Logo</label>
                                                                <input type="file" class="form-control-file" name="logo" accept="image/*">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <button type="submit" class="btn btn-sm btn-primary float-right mt-3">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--// modal --}}

                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Site Address</th>
                            <th>Facebook </th>
                            <th>Contact Number </th>
                            <th>E-mail</th>
                            <th>Site Logo</th>
                            <th>Twitter </th>
                            <th>Instagram </th>
                            <th>Youtube </th>
                            <th>Linkedin</th>
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


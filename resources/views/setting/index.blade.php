@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Settings</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('setting.index') }}">Settings</a></li>
                        <li class="active">Create</li>
                    </ol>
                </div>
            </div>
            <!-- Start Widget -->
            <div class="row">
                {{-- <div class="col-md-2"></div> --}}
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading d-flex justify-content-between align-items-center">
                            <h3 style="display: inline" class="panel-title">Update Company Information</h3>
                        </div>
                        <div class="panel-body">
                            <form  class="form-horizontal" role="form" action="{{ route('setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="com_name" class="col-sm-3 control-label">com_name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="col-sm-3 form-control" name="com_name" value="{{ $setting->com_name }}" placeholder="Enter com_name">
                                        @error('com_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="com_address" class="col-sm-3 control-label">Company Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="com_address" value="{{ $setting->com_address }}" placeholder="Enter com address">
                                        @error('com_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="com_email" class="col-sm-3 control-label">Company Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="com_email" value="{{ $setting->com_email }}" placeholder="Enter com email">
                                        @error('com_email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="com_phone" class="col-sm-3 control-label">Phone</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="com_phone" value="{{ $setting->com_phone }}" placeholder="Enter com phone">
                                        @error('com_phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="com_mobile" class="col-sm-3 control-label">Mobile</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="com_mobile" value="{{ $setting->com_mobile }}" placeholder="Enter mobile">
                                        @error('com_mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="com_city" class="col-sm-3 control-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="com_city" value="{{ $setting->com_city }}" placeholder="Enter City">
                                        @error('com_city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="com_country" class="col-sm-3 control-label">Country</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="com_country" value="{{ $setting->com_country }}" placeholder="Enter bank branch">
                                        @error('com_country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="com_zipcode" class="col-sm-3 control-label">Zip Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="com_zipcode" value="{{ $setting->com_zipcode }}" placeholder="Enter account holder">
                                        @error('com_zipcode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="com_logo" class="col-sm-3 control-label">New logo</label>
                                    <div class="col-sm-9">
                                        <img src="#" id="image" >
                                        <input type="file" class="form-control-file upload" name="com_logo" accept="image/*" onchange="readURL(this)">
                                        @error('com_logo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <img src="{{ asset($setting->com_logo) }}" width="100px" name="old_photo">
                                    </div>
                                </div>

                                <div class="form-group m-b-0">
                                    <div class="col-sm-offset-3 col-sm-9">
                                      <button type="submit" class="btn btn-purple waves-effect waves-light" style="margin-top: 10px">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div>
            </div>

        </div> <!-- container -->
    </div> <!-- content -->
</div>


@endsection

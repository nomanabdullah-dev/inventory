@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Category</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('category.index') }}">Categories</a></li>
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
                            <h3 style="display: inline" class="panel-title">Products Import</h3>
                            <a href="{{ route('productexport') }}" class="btn btn-warning" style="float: right">Download Xlsx</a>
                        </div>
                        <div class="panel-body">
                            <form  class="form-horizontal" role="form" action="{{ route('productimport') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Xlsx File Input</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="col-sm-3 form-control" name="import_file" required>
                                    </div>
                                </div>

                                <div class="form-group m-b-0">
                                    <div class="col-sm-offset-3 col-sm-9">
                                      <button type="submit" class="btn btn-purple waves-effect waves-light" style="margin-top: 10px">Upload</button>
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

@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Employee !</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('employee.index') }}">Employee</a></li>
                        <li class="active">Create</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                hello
            </div>

        </div> <!-- container -->

    </div> <!-- content -->



</div>
@endsection

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
                        <li class="active">Show</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading  d-flex justify-content-between align-items-center">
                            <h3 style="display: inline" class="panel-title">Employee Details</h3>
                            <a href="{{ route('employee.index') }}" class="btn btn-success" style="float: right">Back</a>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $employee->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $employee->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{ $employee->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td colspan="4">{{ $employee->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Experience</th>
                                        <td>{{ $employee->experience }}</td>
                                    </tr>
                                    <tr>
                                        <th>NID Number</th>
                                        <td colspan="4">{{ $employee->nid }}</td>
                                    </tr>
                                    <tr>
                                        <th>Salary</th>
                                        <td colspan="1">{{ $employee->salary }}</td>
                                    </tr>
                                    <tr>
                                        <th>Vacation</th>
                                        <td>{{ $employee->vacation }}</td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td>{{ $employee->city }}</td>
                                    </tr>
                                    <tr>
                                        <th>Photo</th>
                                        <td colspan="4"><img src="{{ asset($employee->photo) }}" width="100px"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> <!-- Panel-body -->

                    </div> <!-- Panel -->
                </div>
            </div>

        </div> <!-- container -->

    </div> <!-- content -->



</div>
@endsection

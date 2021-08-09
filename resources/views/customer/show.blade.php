@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Customer !</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('customer.index') }}">Customers</a></li>
                        <li class="active">Show</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading d-flex justify-content-between align-items-center">
                            <h3 style="display: inline" class="panel-title">Customer Details</h3>
                            <a href="{{ route('customer.index') }}" class="btn btn-warning" style="float: right">Back</a>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $customer->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $customer->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{ $customer->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td colspan="4">{{ $customer->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shop Name</th>
                                        <td>{{ $customer->shop_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bank Name</th>
                                        <td colspan="4">{{ $customer->bank_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bank Branch</th>
                                        <td colspan="1">{{ $customer->bank_branch }}</td>
                                    </tr>
                                    <tr>
                                        <th>Account Holder</th>
                                        <td>{{ $customer->account_holder }}</td>
                                    </tr>
                                    <tr>
                                        <th>Account Number</th>
                                        <td>{{ $customer->account_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td>{{ $customer->city }}</td>
                                    </tr>
                                    <tr>
                                        <th>Photo</th>
                                        <td colspan="4"><img src="{{ asset($customer->photo) }}" width="100px"></td>
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

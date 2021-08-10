@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Product</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('product.index') }}">Products</a></li>
                        <li class="active">Show</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading d-flex justify-content-between align-items-center">
                            <h3 style="display: inline" class="panel-title">Product Details</h3>
                            <a href="{{ route('product.index') }}" class="btn btn-warning" style="float: right">Back</a>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $product->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td>{{ $product->category->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Supplier</th>
                                        <td>{{ $product->supplier->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Code</th>
                                        <td colspan="4">{{ $product->code }}</td>
                                    </tr>
                                    <tr>
                                        <th>Garage</th>
                                        <td>{{ $product->garage }}</td>
                                    </tr>
                                    <tr>
                                        <th>Route</th>
                                        <td colspan="4">{{ $product->route }}</td>
                                    </tr>
                                    <tr>
                                        <th>Buying Date</th>
                                        <td colspan="1">{{ $product->buy_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>Expire Date</th>
                                        <td>{{ $product->expire_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>Buying Price</th>
                                        <td>{{ $product->buying_price }}</td>
                                    </tr>
                                    <tr>
                                        <th>Selling Price</th>
                                        <td>{{ $product->selling_price }}</td>
                                    </tr>
                                    <tr>
                                        <th>Photo</th>
                                        <td colspan="4"><img src="{{ asset($product->photo) }}" width="100px"></td>
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

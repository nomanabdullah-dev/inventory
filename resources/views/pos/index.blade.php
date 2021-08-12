@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12 bg-success">
                    <h4 class="pull-left page-title text-white">POS (Point of Sale)</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ route('dashboard') }}" class="text-white">Dashboard</a></li>
                        <li class="active" style="color: white">{{ date("d-m-y") }}</li>
                    </ol>
                </div>
            </div> <br>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div class="portfolioFilter">
                        @foreach ($customers as $customer)
                            <a href="#" data-filter="*" value="{{ $customer->id }}" class="current">{{ $customer->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div><br>
            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        {{-- left side --}}
                        <div class="col-md-6">
                            <div class="price_card text-center">
                                <ul class="price-features" style="border: 1px solid gray">
                                    <table class="table">
                                        <thead class="bg-info">
                                            <tr>
                                                <th class="text-white">Name</th>
                                                <th class="text-white">Qty</th>
                                                <th class="text-white">Price</th>
                                                <th class="text-white">Sub Total</th>
                                                <th class="text-white">Action</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $prod = Cart::content();
                                        @endphp
                                        <tbody>
                                            @foreach ($prod as $row)
                                            <tr>
                                                <td>{{ $row->name }}</td>
                                                <td>
                                                    <form action="{{ route('cart.update', $row->rowId) }}" method="POST">
                                                        @csrf
                                                    <input type="number" name="qty" value="{{ $row->qty }}" style="width:50px">
                                                    <button class="btn btn-success" style="margin-top: -2px"><i class="fa fa-check"></i></button>
                                                    </form>
                                                </td>
                                                <td>{{ $row->price }}</td>
                                                <td>{{ ($row->price*$row->qty) }}</td>
                                                <td><a href="{{ route('cart.remove', $row->rowId) }}"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </ul>
                                <div class="pricing-footer bg-primary">
                                    <p>Quantity: {{ Cart::count() }}</p>
                                    <p>Sub Total: {{ Cart::subtotal() }}</p>
                                    <p>Vat: {{ Cart::tax() }}</p>
                                    <hr>
                                    <p style="font-size: 22px"><b>Total: {{ Cart::total() }}</b></p>
                                </div>

                                <form action="{{ route('create.invoice') }}" method="post">
                                    @csrf

                                    <div class="panel">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3 style="display: inline">Select Customer</h3>
                                            <a href="" class="btn btn-primary btn-sm pull-right waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Add New</a>
                                        </div>
                                        <div class="form-control">
                                            <select class="form-control" name="customer_id">
                                                <option value="">Select Customer</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn btn-success" type="submit">Create Invoice</button>
                                </form>

                            </div> <!-- end Pricing_card -->
                        </div>



                        {{-- right side --}}
                        <div class="col-md-6">
                            <table id="datatable" class="table table-striped table-bordered dataTable no-footer"
                                role="grid" aria-describedby="datatable_info">
                                <thead>
                                    <tr role="row">
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Product Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr role="row" class="odd">
                                        <form action="{{ route('add.cart') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="hidden" name="name" value="{{ $product->name }}">
                                            <input type="hidden" name="qty" value="1">
                                            <input type="hidden" name="price" value="{{ $product->selling_price }}">
                                            <input type="hidden" name="weight" value="1">
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->code }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-plus-square"></i></button>
                                        </td>
                                        </form>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container -->

    </div> <!-- content -->
</div>



{{-- customer add modal --}}
<form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content bg-success">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Add New Customer</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" class="control-label">name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email" class="control-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="email">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="phone" class="control-label">Phone</label>
                            <input type="number" class="form-control" id="phone" name="phone" placeholder="123456">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="address" class="control-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="address">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="shop_name" class="control-label">shop_name</label>
                            <input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="shop_name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="city" class="control-label">city</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="city">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="bank_name" class="control-label">Bank Name</label>
                            <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="bank name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="bank_branch" class="control-label">Bank Branch</label>
                            <input type="text" class="form-control" id="bank_branch" name="bank_branch" placeholder="bank branch">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="account_holder" class="control-label">Account Holder</label>
                            <input type="text" class="form-control" id="account_holder" name="account_holder" placeholder="account holder">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="account_number" class="control-label">Account Number</label>
                            <input type="text" class="form-control" id="account_number" name="account_number" placeholder="account number">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-sm-9">
                                <img src="#" id="image">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="photo" class="control-label">Photo</label>
                            <input type="file" class="form-control-file upload" name="photo" accept="image/*" onchange="readURL(this)">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
            </div>
        </div>
    </div>
</div>
</form>
<!-- /.modal -->

@endsection

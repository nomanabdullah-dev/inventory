@extends('layouts.app')

@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Invoice</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('pos.index') }}">POS</a></li>
                        <li class="active">Invoice</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Invoice</h4>
                        </div>
                        <div class="panel-body">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h4 class="text-right"><img src="images/logo_dark.png" alt="velonic"></h4>

                                </div>
                                <div class="pull-right">
                                    <h4>Invoice # <br>
                                        <strong>{{ date('d/m/y') }}</strong>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="pull-left m-t-30">
                                        <address>
                                            <strong>{{ $customer->name }}</strong><br>
                                            Shop Name : {{ $customer->shop_name }}<br>
                                            Address: {{ $customer->address }}<br>
                                            City: {{ $customer->city }}<br>
                                            Phone: {{ $customer->phone }}
                                        </address>
                                    </div>
                                    <div class="pull-right m-t-30">
                                        <p><strong>Order Date: </strong> {{ date('d/m/y') }}</p>
                                        <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                        <p class="m-t-10"><strong>Order ID: 1</strong></p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-h-50"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table m-t-30">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Item</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Cost</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $sl=1;
                                                @endphp
                                                @foreach ($contents as $cont)
                                                <tr>
                                                    <td>{{ $sl++ }}</td>
                                                    <td>{{ $cont->name }}</td>
                                                    <td>{{ $cont->qty }}</td>
                                                    <td>{{ $cont->price }}</td>
                                                    <td>{{ ($cont->price*$cont->qty) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="border-radius: 0px;">
                                <div class="col-md-3 col-md-offset-9">
                                    <p class="text-right"><b>Sub-total:</b> {{ Cart::subtotal() }}</p>
                                    <p class="text-right">VAT: {{ Cart::tax() }}</p>
                                    <hr>
                                    <h3 class="text-right">Total: {{ Cart::total() }}</h3>
                                </div>
                            </div>
                            <hr>
                            <div class="hidden-print">
                                <div class="pull-right">
                                    <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i
                                            class="fa fa-print"></i></a>
                                    <a href="#" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Submit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>



{{-- pament modal --}}
<form action="{{ route('final.invoice') }}" method="POST">
    @csrf
<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content bg-success">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <div>
                    <h4 class="modal-title">Invoice of {{ $customer->name }}
                        <span class="pull-right">Total: {{ Cart::total() }}</span>
                    </h4>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" class="control-label">Payment</label>
                            <select name="payment_status" class="form-control">
                                <option value="HandCash">HandCash</option>
                                <option value="Cheque">Cheque</option>
                                <option value="Due">Due</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pay" class="control-label">pay</label>
                            <input type="text" class="form-control" id="pay" name="pay" placeholder="pay">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="due" class="control-label">Due</label>
                            <input type="number" class="form-control" id="due" name="due" placeholder="due">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                <input type="hidden" name="order_date" value="{{ date('d/m/y') }}">
                <input type="hidden" name="order_status" value="pending">
                <input type="hidden" name="total_products" value="{{ Cart::count() }}">
                <input type="hidden" name="sub_total" value="{{ Cart::subtotal() }}">
                <input type="hidden" name="vat" value="{{ Cart::tax() }}">
                <input type="hidden" name="total" value="{{ Cart::total() }}">
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

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
                        <div class="panel-body">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h4 class="text-right"><img src="images/logo_dark.png" alt="velonic"></h4>

                                </div>
                                <div class="pull-right">
                                    <h4>Order Date <br>
                                        <strong>{{ $order->order_date }}</strong>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="pull-left m-t-30">
                                        <address>
                                            <strong>{{ $order->customer->name }}</strong><br>
                                            Shop Name : {{ $order->customer->shop_name }}<br>
                                            Address: {{ $order->customer->address }}<br>
                                            City: {{ $order->customer->city }}<br>
                                            Phone: {{ $order->customer->phone }}
                                        </address>
                                    </div>
                                    <div class="pull-right m-t-30">
                                        <p><strong>Today: </strong> {{ date('d/m/y') }}</p>
                                        <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                        <p class="m-t-10"><strong>Order ID: {{ $order->id }}</strong></p>
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
                                                    <th>Product Name</th>
                                                    <th>Code</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Cost</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $sl=1;
                                                @endphp
                                                @foreach ($order_datails as $cont)
                                                <tr>
                                                    <td>{{ $sl++ }}</td>
                                                    <td>{{ $cont->product->name }}</td>
                                                    <td>{{ $cont->product->code }}</td>
                                                    <td>{{ $cont->quantity }}</td>
                                                    <td>{{ $cont->unitcost }}</td>
                                                    <td>{{ ($cont->unitcost*$cont->quantity) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="border-radius: 0px;">
                                <div class="col-md-9">
                                    <h5>Payment By: {{ $order->payment_status }}</5>
                                    <h5>Pay: {{ $order->pay }}</h5>
                                    <h5>Due: {{ $order->due }}</h5>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-right"><b>Sub-total:</b> {{ $order->sub_total }}</p>
                                    <p class="text-right">VAT: {{ $order->vat }}</p>
                                    <hr>
                                    <h3 class="text-right">Total: {{ $order->total }}</h3>
                                </div>
                            </div>
                            <hr>
                            @if ($order->order_status == 'approved')
                            @else
                            <div class="hidden-print">
                                <div class="pull-right">
                                    <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i
                                            class="fa fa-print"></i></a>
                                    <a href="{{ route('order.done', $order->id) }}" class="btn btn-primary waves-effect waves-light">Done</a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>



@endsection

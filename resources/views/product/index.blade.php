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
                        <li class="active">All Products</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading d-flex justify-content-between align-items-center">
                            <h3 class="panel-title" style="display: inline">All Products</h3>
                            <a href="{{ route('product.create') }}" class="btn btn-warning" style="float: right">Add Product</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div id="datatable_wrapper"
                                        class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="dataTables_length" id="datatable_length"><label>Show <select
                                                            name="datatable_length" aria-controls="datatable"
                                                            class="form-control input-sm">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select> entries</label></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div id="datatable_filter" class="dataTables_filter">
                                                    <label>Search:<input type="search" class="form-control input-sm"
                                                            placeholder="" aria-controls="datatable"></label></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="datatable"
                                                    class="table table-striped table-bordered dataTable no-footer"
                                                    role="grid" aria-describedby="datatable_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0"
                                                                aria-controls="datatable" rowspan="1" colspan="1"
                                                                style="width: 155px;" aria-sort="ascending"
                                                                aria-label="Name: activate to sort column descending">
                                                                Name
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable"
                                                                rowspan="1" colspan="1" style="width: 262px;"
                                                                aria-label="Position: activate to sort column ascending">
                                                                Code
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable"
                                                                rowspan="1" colspan="1" style="width: 116px;"
                                                                aria-label="Office: activate to sort column ascending">
                                                                Image
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable"
                                                                rowspan="1" colspan="1" style="width: 89px;"
                                                                aria-label="Salary: activate to sort column ascending">
                                                                Selling Price
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable"
                                                                rowspan="1" colspan="1" style="width: 89px;"
                                                                aria-label="Salary: activate to sort column ascending">
                                                                Garage
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable"
                                                                rowspan="1" colspan="1" style="width: 89px;"
                                                                aria-label="Salary: activate to sort column ascending">
                                                                Route
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable"
                                                                rowspan="1" colspan="1" style="width: 89px;"
                                                                aria-label="Salary: activate to sort column ascending">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                        @foreach ($products as $product)
                                                            <tr role="row" class="odd">
                                                                <td class="sorting_1">{{ $product->name }}</td>
                                                                <td>{{ $product->code }}</td>
                                                                <td><img src="{{ $product->photo }}" width="100px"  height="100px"></td>
                                                                <td>{{ $product->selling_price }}</td>
                                                                <td>{{ $product->garage }}</td>
                                                                <td>{{ $product->route }}</td>
                                                                <td>
                                                                    <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary"><i class="fa fa-eye   "></i></a>
                                                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>

                                                                    <button onclick="deleteItem(this)" data-url="{{ route('product.destroy', $product->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i>
                                                                    </button>

                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="dataTables_info" id="datatable_info" role="status"
                                                    aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="dataTables_paginate paging_simple_numbers"
                                                    id="datatable_paginate">
                                                    <ul class="pagination">
                                                        <li class="paginate_button previous disabled"
                                                            aria-controls="datatable" tabindex="0"
                                                            id="datatable_previous"><a href="#">Previous</a></li>
                                                        <li class="paginate_button active" aria-controls="datatable"
                                                            tabindex="0"><a href="#">1</a></li>
                                                        <li class="paginate_button " aria-controls="datatable"
                                                            tabindex="0"><a href="#">2</a></li>
                                                        <li class="paginate_button " aria-controls="datatable"
                                                            tabindex="0"><a href="#">3</a></li>
                                                        <li class="paginate_button " aria-controls="datatable"
                                                            tabindex="0"><a href="#">4</a></li>
                                                        <li class="paginate_button " aria-controls="datatable"
                                                            tabindex="0"><a href="#">5</a></li>
                                                        <li class="paginate_button " aria-controls="datatable"
                                                            tabindex="0"><a href="#">6</a></li>
                                                        <li class="paginate_button next" aria-controls="datatable"
                                                            tabindex="0" id="datatable_next"><a href="#">Next</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container -->

    </div> <!-- content -->



</div>
@endsection

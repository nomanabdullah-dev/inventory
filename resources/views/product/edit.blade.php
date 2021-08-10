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
                        <li><a href="{{ route('product.index') }}">Product</a></li>
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
                            <h3 style="display: inline" class="panel-title">Update Product</h3>
                            <a href="{{ route('product.index') }}" class="btn btn-warning" style="float: right">Back</a>
                        </div>
                        <div class="panel-body">
                            <form  class="form-horizontal" role="form" action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{ $product->name }}" class="col-sm-3 form-control" name="name"
                                            placeholder="Enter name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="category_id" class="col-sm-3 control-label">Category</label>
                                    <div class="col-sm-9">
                                        <select name="category_id" id="" class="form-control">
                                            <option>Select Category</option>
                                            @foreach ($categories as $category)
                                            <option @if ($category->id == $product->category_id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="supplier_id" class="col-sm-3 control-label">Supplier</label>
                                    <div class="col-sm-9">
                                        <select name="supplier_id" id="" class="form-control">
                                            <option>Select Supplier</option>
                                            @foreach ($suppliers as $supplier)
                                            <option @if ($supplier->id == $product->supplier_id) selected @endif value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('supplier_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="code" class="col-sm-3 control-label">Product Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{ $product->code }}" class="form-control" name="code"
                                            placeholder="Enter product code">
                                        @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="garage" class="col-sm-3 control-label">Garage Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{ $product->garage }}" class="form-control" name="garage"
                                            placeholder="Enter garage name">
                                        @error('garage')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="route" class="col-sm-3 control-label">Route Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{ $product->route }}" class="form-control" name="route"
                                            placeholder="Enter route name">
                                        @error('route')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="buy_date" class="col-sm-3 control-label">Buy Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" value="{{ $product->buy_date }}" class="form-control" name="buy_date"
                                            placeholder="Enter buy date">
                                        @error('buy_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="expire_date" class="col-sm-3 control-label">Expire Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" value="{{ $product->expire_date }}" class="form-control" name="expire_date"
                                            placeholder="Enter expire date">
                                        @error('expire_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="buying_price" class="col-sm-3 control-label">Buying Price</label>
                                    <div class="col-sm-9">
                                        <input type="number" value="{{ $product->buying_price }}" class="form-control" name="buying_price"
                                            placeholder="Enter buying price">
                                        @error('buying_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="selling_price" class="col-sm-3 control-label">Selling Price</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{ $product->selling_price }}" class="form-control" name="selling_price"
                                            placeholder="Enter selling price">
                                        @error('selling_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="photo" class="col-sm-3 control-label">Photo</label>
                                    <div class="col-sm-9">
                                        <img src="#" id="image">
                                        <input type="file" class="form-control-file upload" name="photo"
                                            accept="image/*" onchange="readURL(this)">
                                        @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <img src="{{ asset($product->photo) }}" width="100px" name="old_photo">
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

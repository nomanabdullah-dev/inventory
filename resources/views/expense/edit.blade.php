@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Expense</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('expense.index') }}">Expense</a></li>
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
                            <h3 style="display: inline" class="panel-title">Update Expense</h3>
                            <a href="{{ url()->previous() }}" class="btn btn-warning" style="float: right">Back</a>
                        </div>
                        <div class="panel-body">
                            <form  class="form-horizontal" role="form" action="{{ route('expense.update', $expense->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title" class="col-sm-3 control-label">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="col-sm-3 form-control" name="title" value="{{ $expense->title }}" placeholder="Enter title">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="details" class="col-sm-3 control-label">Details</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="col-sm-3 form-control" name="details" value="{{ $expense->details }}" placeholder="Enter details">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="amount" class="col-sm-3 control-label">Amount</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="col-sm-3 form-control" name="amount" value="{{ $expense->amount }}" placeholder="Enter amount">
                                        @error('amount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <input type="hidden" name="date" value="{{ date("d-m-y") }}">
                                    <input type="hidden" name="month" value="{{ date("F") }}">
                                    <input type="hidden" name="year" value="{{ date("Y") }}">
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

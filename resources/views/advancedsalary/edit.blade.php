@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Advanced Salary</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('advancedsalary.index') }}">Advanced Salary</a></li>
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
                            <h3 style="display: inline" class="panel-title">Update Advanced Salary</h3>
                            <a href="{{ route('advancedsalary.index') }}" class="btn btn-warning" style="float: right">Back</a>
                        </div>
                        <div class="panel-body">
                            <form  class="form-horizontal" role="form" action="{{ route('advancedsalary.update', $adsalary->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="employee_id" class="col-sm-3 control-label">Employee</label>
                                    <div class="col-sm-9">
                                        <select name="employee_id" id="" class="form-control">
                                            <option>Select Employee</option>
                                            @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}" @if($employee->id == $adsalary->employee_id) selected @endif>{{ $employee->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('employee_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="month" class="col-sm-3 control-label">Month</label>
                                    <div class="col-sm-9">
                                        <select name="month" id="" class="form-control">
                                            <option value="{{ $adsalary->id }}" {{ $adsalary->monthe }} selected>{{ $adsalary->month }}</option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                        @error('month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="year" class="col-sm-3 control-label">Year</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="year" value="{{ $adsalary->year }}" placeholder="Enter year">
                                        @error('year')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="advanced_salary" class="col-sm-3 control-label">Advanced Salary</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="advanced_salary"  value="{{ $adsalary->advanced_salary }}" placeholder="Enter advanced salary">
                                        @error('advanced_salary')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $message }}</strong>
                                            </span>
                                        @enderror
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

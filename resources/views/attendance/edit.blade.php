@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Update Attendance</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="active">Update Attendance</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading d-flex justify-content-between align-items-center">
                            <h3 class="panel-title" style="display: inline">Update Attendance</h3>
                            <span class="pull-right"style="font-size:18px"><b></b></span>
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
                                                                Employee Name
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable"
                                                                rowspan="1" colspan="1" style="width: 262px;"
                                                                aria-label="Position: activate to sort column ascending">
                                                                Photo
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable"
                                                                rowspan="1" colspan="1" style="width: 89px;"
                                                                aria-label="Salary: activate to sort column ascending">
                                                                Attendance
                                                            </th>
                                                        </tr>
                                                    </thead>

                                                    <form action="{{ route('attendance.store') }}" method="POST">
                                                        @csrf
                                                        <tbody>
                                                            @foreach ($employees as $employee)
                                                            <tr role="row" class="odd">
                                                                <td class="sorting_1">{{ $employee->name }}</td>
                                                                <td><img src="{{ url($employee->photo) }}" width="90px"></td>
                                                                <input type="hidden" name="employee_id[]"
                                                                    value="{{ $employee->id }}">
                                                                <td>
                                                                    <input type="radio"
                                                                        name="attendance[{{ $employee->id }}]"
                                                                        value="Present" {{ $employee->attendance == 'Present' ? 'checked':'' }} required>Present
                                                                    <input type="radio"
                                                                        name="attendance[{{ $employee->id }}]"
                                                                        value="Absent">Absent
                                                                </td>
                                                                <input type="hidden" name="att_date"
                                                                    value="{{ date("d/m/y") }}">
                                                                <input type="hidden" name="att_year"
                                                                    value="{{ date("Y") }}">
                                                            </tr>
                                                            @endforeach

                                                        </tbody>
                                                </table>
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                    </form>
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

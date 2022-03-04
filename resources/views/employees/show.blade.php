@extends('layouts.default')
@section('title', 'Employee View')
@section('employees', 'active')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    @yield('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Employee View</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Employees</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update Employee Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form id="update_employee_form" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="room#">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{$first_name}}" placeholder="E.g Ahsan">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="room#">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{$last_name}}" placeholder="E.g Alamgir">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="room#">CNIC</label>
                                    <input type="text" class="form-control" id="cnic" name="cnic" value="{{$cnic}}" placeholder="E.g 35202-5968523-2">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="room#">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{$address}}" placeholder="E.g House # ..., Street # ...">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="room#">City</label>
                                    <input type="text" class="form-control" id="city" name="city" value="{{$city}}" placeholder="E.g Lahore">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="room#">State</label>
                                    <input type="text" class="form-control" id="state" name="state" value="{{$state}}" placeholder="E.g Punjab">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Select Employement Type</label>
                                    <select class="form-control" id="emp_type" name="emp_type">
                                        <option>choose option</option>
                                        <option>Manager</option>
                                        <!-- <option>Internet Manager</option> -->
                                        <option>Office Boy</option>
                                        <option>Security Guard(Day)</optionv>
                                        <option>Security Guard(Night)</optionv>
                                        <option>Sweeper</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Upload Employee Images</label>
                                        <div class="custom-file">
                                            <input type="file" name="images[]" multiple class="custom-file-input form-control" id="emp_images">
                                            <label class="custom-file-label" for="emp_images">Choose Images</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Joining Date</label>
                                    <div class="input-group date" id="joining_date" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" value="{{$joining_date}}" data-target="#joining_date" name="joining_date" id="joining_date">
                                        <div class="input-group-append" data-target="#joining_date"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="">Salary</label>
                                    <input type="text" class="form-control" id="salary" name="salary" value={{$salary}} placeholder="E.g 20000">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="is_current_emp" name="is_current_emp" @if($is_current_emp == "1") ? checked : null @endif>
                                    <label class="form-check-label" for="is_current_emp">
                                        Current Employee
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="is_room_alloted" name="is_room_alloted" @if($is_room_alloted == "1") ? checked : null @endif>
                                    <label class="form-check-label" for="is_room_alloted">
                                        Room Alloted
                                    </label>
                                </div>
                                <input type="hidden" id="id" name="id" value={{$id}}>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="btn_update_employee" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</section>

@stop

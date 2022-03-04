@extends('layouts.default')
@section('title', 'Employees')
@section('employees', 'active')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    @yield('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Employees</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Employees</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row mb-2">
            <div class="col-md-4">
                <button class="btn btn-primary" data-toggle="modal" data-target="#newEmployee">Add New Employee</button>
            </div>
        </div>
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
                        <h3 class="card-title">Employees Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>CNIC</th>
                                    <th>Emp Type</th>
                                    <!-- <th>Rent Status</th>
                                    <th>ID card Number</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $employee)
                                <tr class='clickable-row' data-href='/employees/{{$employee->id}}' role="button">
                                    <td>{{$employee->id}}</td>
                                    <td>{{$employee->first_name}} {{$employee->last_name}}</td>
                                    <td>{{$employee->cnic}}</td>
                                    <td>{{$employee->emp_type}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </div>
</section>

<!--New Room Modal -->
<div class="modal fade" id="newEmployee" tabindex="-1" role="dialog" aria-labelledby="newEmployeeLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newEmployeeLabel">Add New Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="save_employee_form" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="room#">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="E.g Ahsan">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="room#">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="E.g Alamgir">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="room#">CNIC</label>
                            <input type="text" class="form-control" id="cnic" name="cnic" placeholder="E.g 35202-5968523-2">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="room#">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="E.g House # ..., Street # ...">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="room#">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="E.g Lahore">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="room#">State</label>
                            <input type="text" class="form-control" id="state" name="state" placeholder="E.g Punjab">
                        </div>
                    </div>
                        <!-- <div class="form-group col-md-4">
                            <label>Select Room Type</label>
                            <select class="form-control" id="room_type" name="room_type">
                                <option value="">choose option</option>
                                <option value="1">Single (Basement)</option>
                                <option value="2">2 Persons (Basement)</option>
                                <option value="3">2+ persons (Basement)</option>
                                <option value="4">Single</option>
                                <option value="5">2 Persons</option>
                                <option value="6">2+ persons</option>
                                <option value="7">VIP Room</option>
                                <option value="8">VIP Flat </option>
                            </select>
                        </div> -->
                        <!-- <div class="form-group col-md-4">
                            <label for="rent">Rent</label>
                            <input type="text" class="form-control" id="rent" name="rent" placeholder="E.g 12000/-, 12,000/-">
                        </div> -->
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
                        <!-- <div class="col-md-8">
                            <div style="padding-top:20px;" id="preview"></div>
                        </div> -->
                        
                        <div class="form-group">
                            <label>Joining Date</label>
                            <div class="input-group date" id="joining_date" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#joining_date" name="joining_date" id="joining_date">
                                <div class="input-group-append" data-target="#joining_date" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Salary</label>
                            <input type="text" class="form-control" id="salary" name="salary" placeholder="E.g 20000">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="is_current_emp" name="is_current_emp">
                            <label class="form-check-label" for="is_current_emp">
                                Current Employee
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="is_room_alloted" name="is_room_alloted">
                            <label class="form-check-label" for="is_room_alloted">
                                Room Alloted
                            </label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_save_employee" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>


@stop

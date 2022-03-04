<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Employee::all();
        return view('employees.view', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->cnic = $request->cnic;
        $employee->address = $request->address;
        $employee->city = $request->city;
        $employee->state = $request->state;
        $employee->emp_type = $request->emp_type;
        $employee->joining_date = date('Y-m-d', strtotime($request->joining_date));
        $employee->salary = $request->salary;
        if($request->is_current_emp == "on"){
            $employee->is_current_emp = 1;
        }
        if($request->is_room_alloted == "on"){
            $employee->is_room_alloted = 1;
        }
        
        $images_data;
        if($files = $request->file('images')){
            foreach ($files as $file) {
                $image_name = uniqid();
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $file->storeAs('/Employees Images',$image_full_name);
                $images_data[] = $image_full_name;
            }
        }else{ $images_data = []; }
        $employee->images = serialize($images_data);
        $employee->save();
        return response()->json(['status'=>true, 'message'=>'Employee Saved Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Employee::find($id);
        $data->images = unserialize($data->images);
        $data->joining_date = date('d/m/Y', strtotime($data->joining_date));
        // dd($data);
        return view('employees.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->cnic = $request->cnic;
        $employee->address = $request->address;
        $employee->city = $request->city;
        $employee->state = $request->state;
        $employee->emp_type = $request->emp_type;
        $employee->joining_date = date('Y-m-d', strtotime($request->joining_date));
        $employee->salary = $request->salary;
        if($request->is_current_emp == "on"){
            $employee->is_current_emp = 1;
        }  else { $employee->is_current_emp = 0; }
        if($request->is_room_alloted == "on"){
            $employee->is_room_alloted = 1;
        } else { $employee->is_room_alloted = 0; }

        $images_data = unserialize($employee->images);
        if($files = $request->file('images')){
            foreach ($files as $file) {
                $image_name = uniqid();
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $file->storeAs('/Employees Images',$image_full_name);
                $images_data[] = $image_full_name;
            }
        }
        $employee->images = serialize($images_data);
        $employee->update();
        return response()->json(['status'=>true, 'message'=>'Employee Saved Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

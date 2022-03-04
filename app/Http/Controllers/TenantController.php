<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Room;
use App\Models\User;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rooms'] = Room::all();
        $data['data'] = Tenant::all();
        return view('tenants.view', $data);
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
        // dd($request->all());
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->cnic = $request->cnic;
        $user->email = $request->email;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country = "Pakistan";
        $user->address = $request->address;
        $user->role = "room_holder";
        $images_data;
        if($files = $request->file('images')){
            foreach ($files as $file) {
                $image_name = uniqid();
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $file->storeAs('/Tenants Images',$image_full_name);
                $images_data[] = $image_full_name;
            }
        }else{ $images_data = []; }
        $user->images = serialize($images_data);
        $user->save();
        
        $tenant = new Tenant();
        $tenant->user_id = $user->id;
        $tenant->room_id = $request->room_id;
        $tenant->shared_with = json_encode($request->shared_with);
        $tenant->joining_date = date('Y-m-d', strtotime($request->joining_date));
        if($request->has_noticed == "on"){
            $tenant->has_noticed = 1;
        }
        $tenant->save();
        return response()->json(['status'=>true, 'message'=>'Tenant Saved Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Tenant::with('User')->find($id);
        $data['rooms'] = Room::all();
        // dd($data);
        $data->images = unserialize($data->images);
        $data->joining_date = date('d/m/Y', strtotime($data->joining_date));
        // dd($data);
        return view('tenants.show', $data);
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
        $tenant = Tenant::find($id);
        $tenant->room_id = $request->room_id;
        $tenant->shared_with = json_encode($request->shared_with);
        $tenant->joining_date = date('Y-m-d', strtotime($request->joining_date));
        if($request->has_noticed == "on"){
            $tenant->has_noticed = 1;
        }
        $user = User::find($tenant->user_id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->cnic = $request->cnic;
        $user->email = $request->email;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country = "Pakistan";
        $user->address = $request->address;
        $user->role = "room_holder";
        $images_data;
        if($files = $request->file('images')){
            foreach ($files as $file) {
                $image_name = uniqid();
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $file->storeAs('/Tenants Images',$image_full_name);
                $images_data[] = $image_full_name;
            }
        }else{ $images_data = []; }
        $user->images = serialize($images_data);
        $tenant->update();
        $user->update();
        return response()->json(['status'=>true, 'message'=>'Tenant Saved Successfully']);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['data'] = Room::all();
        return view('rooms.view', $data);
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
        $room = new Room();
        $room->id = $request->id;
        $room->room_type = $request->room_type;
        $room->rent = $request->rent;
        $room->floor = $request->floor;
        $room->room_holder = $request->room_holder;
        $room->room_owner = $request->room_owner;
        if($request->one_person == "on"){
            $room->is_one_person = 1;
        }
        if($request->two_person == "on"){
            $room->is_two_person = 1;
        }
        if($request->multiple_person == "on"){
            $room->is_multiple_person = 1;
        }
        if($request->vip == "on"){
            $room->is_vip = 1;
        }
        if($request->one_bed == "on"){
            $room->is_one_bed = 1;
        }
        if($request->two_bed == "on"){
            $room->is_two_bed = 1;
        }
        if($request->double_bed == "on"){
            $room->is_double_bed = 1;
        }
        if($request->one_mattress == "on"){
            $room->is_one_mattress = 1;
        }
        if($request->two_mattress == "on"){
            $room->is_two_mattress = 1;
        }
        if($request->double_mattress == "on"){
            $room->is_double_mattress = 1;
        }
        if($request->attach_washroom == "on"){
            $room->is_attach_washroom = 1;
        }
        if($request->combine_washroom == "on"){
            $room->is_combine_washroom = 1;
        }
        $images_data;
        if($files = $request->file('images')){
            foreach ($files as $file) {
                $image_name = uniqid();
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $file->storeAs('/Room Images',$image_full_name);
                $images_data[] = $image_full_name;
            }
        }else{ $images_data = []; }
        $room->images = serialize($images_data);
        $room->save();
        return response()->json(['status'=>true, 'message'=>'Room Saved Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Room::find($id);
        $data->images = unserialize($data->images);
        // dd($data->room_type);
        // $room_types = RoomType::all();

        return view('rooms.show', $data);
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
        // dd($id);
        $room = Room::find($id);
        // dd($request->all());
        $room->id = $request->id;
        $room->room_type = $request->room_type;
        $room->rent = $request->rent;
        $room->floor = $request->floor;
        $room->room_holder = $request->room_holder;
        $room->room_owner = $request->room_owner;
        if($request->one_person){ $room->is_one_person = 1; } else { $room->is_one_person = 0; }
        if($request->two_person){ $room->is_two_person = 1; } else { $room->is_two_person = 0; }
        if($request->multiple_person){ $room->is_multiple_person = 1; } else { $room->is_multiple_person = 0; }
        if($request->vip){ $room->is_vip = 1; } else { $room->is_vip = 0; }
        if($request->one_bed){ $room->is_one_bed = 1; } else { $room->is_one_bed = 0; }
        if($request->two_bed){ $room->is_two_bed = 1; } else { $room->is_two_bed = 0; }
        if($request->double_bed){ $room->is_double_bed = 1; } else { $room->is_double_bed = 0; }
        if($request->one_mattress){ $room->is_one_mattress = 1; } else { $room->is_one_mattress = 0; }
        if($request->two_mattress){ $room->is_two_mattress = 1; } else { $room->is_two_mattress = 0; }
        if($request->double_mattress){ $room->is_double_mattress = 1; } else { $room->is_double_mattress = 0; }
        if($request->attach_washroom){ $room->is_attach_washroom = 1; } else { $room->is_attach_washroom = 0; }
        if($request->combine_washroom){ $room->is_combine_washroom = 1; } else { $room->is_combine_washroom = 0; }
        $images_data = unserialize($room->images);
        if($files = $request->file('images')){
            foreach ($files as $file) {
                $image_name = uniqid();
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $file->storeAs('/Room Images',$image_full_name);
                $images_data[] = $image_full_name;
            }
        }
        $room->images = serialize($images_data);
        $room->update();
        return response()->json(['status'=>true, 'message'=>'Room Saved Successfully']);
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

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TruckRecord as TruckRecordResource;
use App\TruckRecord;

class TruckRecordApiController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:truckrecord-list|truckrecord-create|truckrecord-edit|truckrecord-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:truckrecord-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:truckrecord-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:truckrecord-delete', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TruckRecordResource(TruckRecord::paginate(3));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation here
        $truck = new TruckRecord();
        $truck->driver_name = $request->driver_name;
        $truck->driver_phone = $request->driver_phone;
        $truck->company = $request->company;
        $truck->owner_name = $request->owner_name;
        $truck->owner_email = $request->owner_email;
        $truck->truck_model = $request->truck_model;
        $truck->truck_registration = $request->truck_registration;
        $truck->truck_chassis_number = $request->truck_chassis_number;
        $truck->engine_number = $request->engine_number;
        $truck->mileage = $request->mileage;
        $truck->save();
        
        return new TruckRecordResource($truck);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return new TruckRecordResource(TruckRecord::FindOrFail($id));
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
        //validation here
        $truck = TruckRecord::findOrFail($id);
        $truck->driver_name = $request->driver_name;
        $truck->driver_phone = $request->driver_phone;
        $truck->company = $request->company;
        $truck->owner_name = $request->owner_name;
        $truck->owner_email = $request->owner_email;
        $truck->truck_model = $request->truck_model;
        $truck->truck_registration = $request->truck_registration;
        $truck->truck_chassis_number = $request->truck_chassis_number;
        $truck->engine_number = $request->engine_number;
        $truck->mileage = $request->mileage;
        $truck->save();
        
        return new TruckRecordResource($truck);
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
        $truck = TruckRecord::findOrFail($id);
        $truck->delete();
        
        return new TruckRecordResource($truck);
    }
}

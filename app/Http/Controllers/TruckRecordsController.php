<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TruckRecordsController extends Controller
{
    //

     /*
    *Truck Record lists
    */
    public function index() {
        return view('secguard.dashBoard');
    }
    /*
    *Record form
    */
    public function addRecord() {
        return view('secguard.add-record');   
    }
}

@extends('layouts.app')
@section('content')
   <div class="container">
   <div class="card">
   <div class="card-header">{{ __('Enter Truck Details in the form Below') }}<a class="text-success float-right" href="{{ route('home') }}">Back to Dashboard</a></div>
   <div class="card-body">
   <add-truck-record></add-truck-record>
   </div>
   </div>
   </div>
@endsection
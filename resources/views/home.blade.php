@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
        <div class="postAdd col-lg-12 text-right" style="margin-bottom: 20px;">
           <a href="{{ route('secguard.add-record') }}" class="btn btn-success">Add Truck Record</a>
       </div>   
   </div>
   <truck-records></truck-records>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

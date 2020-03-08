@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="postAdd col-lg-12 text-right" style="margin-bottom: 20px;">
           <a href="{{ route('secguard.add-record') }}" class="btn btn-success">Add Record</a>
       </div>   
   </div>
</div>
@endsection
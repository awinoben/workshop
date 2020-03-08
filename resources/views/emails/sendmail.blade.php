@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
<div class="card">
<div class="card-header">
Send Email Notification
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<!-- mail body -->
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
    <p>Thank you</p>

</div>
</div>
</div>
</div>

@endsection
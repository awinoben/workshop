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

<!-- Thank you message -->
<div class="alert alert-success" role="alert">
		 	Thanks, Notification sent successfully!
		</div>

</div>
</div>
</div>
</div>

@endsection
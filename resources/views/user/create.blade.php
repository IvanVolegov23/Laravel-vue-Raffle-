@extends('host.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Raffle</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('user.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Raffle Name:</strong>
                <input type="text" name="rafflename" class="form-control" placeholder="Raffle Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Raffle Price:</strong>
                <input type="text" name="raffleprice" class="form-control" placeholder="Raffle Price">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity of numbers:</strong>
                <input type="text" name="rafflenumber" class="form-control" placeholder="Quantity of numbers">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>PIN CODE:</strong>
                <input type="text" name="pincode" class="form-control" placeholder="PIN CODE">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" style="display:none">
            <div class="form-group">
                <strong>User Id:</strong>
                <input type="text" name="user_id" class="form-control" placeholder="User Id" value="{{$user->id}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection
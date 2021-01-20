@extends('host.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Raffle</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('hosts.index', Auth::user()->id) }}"> Back</a>
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
   
<form action="{{ route('hosts.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Statu:</strong>
                <select class="form-control" id="statu" name="statu">
                    <option>Open</option>
                    <option>Pending Payment</option>
                    <option>Paid</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Method:</strong>
                <select class="form-control" id="method" name="method">
                    <option>CashApp</option>
                    <option>PayPal</option>
                    <option>Zelle</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" style="display:none">
            <div class="form-group">
                <strong>User Id:</strong>
                <input type="text" name="user_id" class="form-control" placeholder="User Id" value="{{Auth::user()->id}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection